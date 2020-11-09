<?php
header('Access-Control-Allow-Origin: *');
require_once('../../../includes/funcoes.php');
require_once('../../../database/config.database.php');
require_once('../../../database/config.php');
header ('Content-type: text/html; charset=utf-8');


if(!empty($_GET['tipo']) ){$tipo = "AND imobiliaria.tipo = '".$_GET['tipo']."'";}
if(!empty($_GET['cidade']) ){$cidade = "AND imobiliaria.cidade = '".$_GET['cidade']."'";}
if(!empty($_GET['bairro']) ){$bairro = "AND imobiliaria.bairro = '".$_GET['bairro']."'";}
if(!empty($_GET['quartos']) ){$quartos = "AND imobiliaria.quartos = '".$_GET['quartos']."'";}
if(!empty($_GET['banheiros']) ){$banheiro = "AND imobiliaria.banheiros = '".$_GET['banheiros']."'";}
if(!empty($_GET['procurar'])){$procurar = "AND imobiliaria.pesquisa LIKE '%".$_GET['procurar']."%'";}
if($_GET['garagem'] == 'true'){$garagem = "AND imobiliaria.garagem = 'checked'";}
if($_GET['mobiliado'] == 'true' ){$mobiliado = "AND imobiliaria.mobiliado = 'checked'";}
if($_GET['pet'] == 'true'){$pet = "AND imobiliaria.pet = 'checked'";}
if($_GET['livre'] == 'true'){$livre = "AND imobiliaria.sol = 'checked'";}
if($_GET['metros'] == 'true'){$metro = "AND imobiliaria.metro = 'checked'";}
if(!empty($_GET['valor'])){$valor = "AND imobiliaria.preco >= ".floatval($_GET['valor']);}


  $pag 		= (isset($_GET['pag']) && $_GET['pag'] != 'undefined' )? $_GET['pag'] : 1;
  $uniqid = uniqid();
  $tamanho_coluna = 3;
  $lista['mostrar_paginacao'] = 'S';

  $query = DBRead('imobiliaria_config','*');
  $config = [];
  foreach ($query as $key => $row) {
    $config[$row['id']] = $row['valor'];
  }

  $contagem_registro 	= DBCount('imobiliaria','*',"
    WHERE imobiliaria.acao = '{$_POST['acao']}' $tipo $cidade $bairro $quartos $banheiro $garagem $mobiliado $pet $sol $livre $metro $valor $procurar
  ");

  $limite 		= $config['busca_limite_pagina'];
  $numPaginas = ceil($contagem_registro/$limite);
  $inicio 		= ($limite*$pag)-$limite;

  $imoveis   = DBRead(
    'imobiliaria',
    'imobiliaria.*, imobiliaria_imov_imagens.uniq as id_foto_capa',
    "INNER JOIN imobiliaria_imov_imagens ON imobiliaria.id_imagem_capa = imobiliaria_imov_imagens.id
    WHERE imobiliaria.acao = '{$_GET['acao']}' $tipo $cidade $bairro $quartos $banheiro $garagem $mobiliado $pet $sol $livre $metro $valor $procurar
    LIMIT $inicio, $limite"
  );

  if(!empty($imoveis)){
    // Escolhendo arquivo para o estilo
  require_once('../listagem/includes/estilo_4.php');
    ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:10px">
    	<center>
    		<div class="btn-group" role="group" aria-label="...">
    			<?php $i = $pag; ?>
    			<?php if ($i <= '1') { ?>
    					<button type="hidden" class="btn btn-default btn-xs hidden" disabled>Anterior</button>
    			<?php } elseif ($i >= '2') { $i = $i - '1'; ?>
    					<button type="button" class="btn btn-default btn-xs" onclick="ImobiliariaBuscaResultado('<?php echo $i; ?>');">Anterior</button>
    			<?php } ?>
    				<?php $i = $pag; ?>
    			<?php if ($numPaginas >= '1' && $numPaginas < '9') { $numPaginas = '0'.$numPaginas; } elseif ($numPaginas > '9') { $numPaginas = $numPaginas; } ?>
    			<?php if ($i >= '1' && $i <= '9') { ?>
    					<button type="button" class="btn btn-default btn-xs" disabled>Página 0<?php echo $i; ?> de <?php echo $numPaginas; ?></button>
    			<?php } elseif ($i > '9') { ?>
    					<button type="button" class="btn btn-default btn-xs" disabled>Página <?php echo $i; ?> de <?php echo $numPaginas; ?></button>
    			<?php } ?>
    				<?php $i = $pag; ?>
    			<?php if ($i >= 1 && $i < $numPaginas) { $i++; ?>
    					<button type="button" class="btn btn-default btn-xs" onclick="ImobiliariaBuscaResultado('<?php echo $i; ?>');">Próximo</button>
    			<?php } elseif ($i == $numPaginas) { ?>
    					<button type="button" class="btn btn-default btn-xs hidden" disabled>Próximo</button>
    			<?php } ?>
    		</div>
    </div>
    <link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>/epack/css/elements/animate.css">
    
    <script>
    function findImov (a){
        var b =" " ;
        document.getElementById('opcoes').style.visibility="visible";
        fetch(UrlPainel+'wa/imobiliaria/listagem/api.php?pesquisa='+a).then( (resposta) =>{
            resposta.text().then((data)=>{
    
                document.getElementById('opcoes').innerHTML = data;
            });
        }).catch(document.getElementById('opcoes').innerHTML = "Nenhum imóvel encontrado");
    }
    function escolhido (z, y)  {
        document.getElementById('procurar').value = y;
        document.getElementById('opcoes').style.visibility="hidden";
    }
    
    function bairros(f){
        
        fetch(UrlPainel+'wa/imobiliaria/listagem/bairro_api.php?cidade='+f).then((prom)=>{
            prom.text().then((dados)=>{
                let as = document.getElementById('bairros_filtrados').innerHTML = dados ;
       
            })
        });
    }
    $(document).ready( function() {
    	$('#shop--list<?php echo $uniqid; ?> .shop--list--bar__view-grid').click(function(){
    		shopUpdateListView('<?php echo $uniqid; ?>', true, 'col-md-<?php echo $tamanho_coluna; ?>');
    	});
    	$('#shop--list<?php echo $uniqid; ?> .shop--list--bar__view-list').click(function(){
    		shopUpdateListView('<?php echo $uniqid; ?>', false, 'col-md-12');
    	});
    });
    </script>
    <?php
  }
  else{  
    ?>
    Nenhum resultado para sua pesquisa foi encontrado!
    <?php
  }

?>
