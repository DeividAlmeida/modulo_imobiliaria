<?php
	header('Access-Control-Allow-Origin: *');
	require_once('../../../includes/funcoes.php');
	require_once('../../../database/config.database.php');
	require_once('../../../database/config.php');

  // Pegar listagem
  $id 		= get('id');
  $pag 		= (isset($_GET['pag']))? $_GET['pag'] : 1;
  $uniqid = uniqid();
	
    if(!empty($_GET['acao'])){$acao = "AND imobiliaria.acao = '".$_GET['acao']."'";}
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

  if (ModoManutencao()) { header("Location: ../manutencao.php"); }

	// Pega configuração
	$query = DBRead('imobiliaria_config','*');

	$config = [];
	foreach ($query as $key => $row) {
		$config[$row['id']] = $row['valor'];
	}

  // Pegando informações da lista
  $query = DBRead('imobiliaria_listas','*',"WHERE id = '{$id}'");
	$lista = $query[0];
	
	switch ($lista['tipo']) {
		// Categoria
		case '1':
			require_once('tipo/tipo_1.php');
			break;
		// Mais vistos
		case '2':
			require_once('tipo/tipo_2.php');
			break;
		// Mais vendidos
		case '3':
			require_once('tipo/tipo_3.php');
			break;
		// Mais recentes
		case '4':
			require_once('tipo/tipo_4.php');
			break;
		default:
			require_once('tipo/tipo_1.php');
	}

  
	// Definindo tamanho das colunas
	switch ($lista['colunas']) {
		case 2:
			$tamanho_coluna = 6;
			break;

		case 3:
			$tamanho_coluna = 4;
			break;

		case 4:
			$tamanho_coluna = 3;
			break;

		default:
			$tamanho_coluna = 6;
			break;
	}

	if($lista['carrocel'] == 'S'){
		require_once('includes/carousel.php');
	}
	else{
		// Escolhendo arquivo para o estilo
		switch ($config['listagem_estilo']) {
			case '4':
				require_once('includes/estilo_4.php');
				break;

			case '5':
				require_once('includes/estilo_4.php');
				break;

			default:
				require_once('includes/estilo_4.php');
				break;
		}
	}
?>

<?php if($lista['mostrar_paginacao'] == 'S'){ ?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:10px">
		<center>
			<div class="btn-group" role="group" aria-label="...">
				<?php $i = $pag; ?>
				<?php if ($i <= '1') { ?>
						<button type="hidden" class="btn btn-default btn-xs hidden" disabled>Anterior</button>
				<?php } elseif ($i >= '2') { $i = $i - '1'; ?>
						<button type="button" class="btn btn-default btn-xs" onclick="ImobiliariaListagem(<?php echo $id; ?>,'<?php echo $i; ?>');">Anterior</button>
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
						<button type="button" class="btn btn-default btn-xs" onclick="ImobiliariaListagem(<?php echo $id; ?>,'<?php echo $i; ?>');">Próximo</button>
				<?php } elseif ($i == $numPaginas) { ?>
						<button type="button" class="btn btn-default btn-xs hidden" disabled>Próximo</button>
				<?php } ?>
			</div>
	</div>
<?php } ?>

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
$(document).ready( function() {
	$('#shop--list<?php echo $uniqid; ?> .shop--list--bar__view-grid').click(function(){
		shopUpdateListView('<?php echo $uniqid; ?>', true, 'col-md-<?php echo $tamanho_coluna; ?>');
	});
	$('#shop--list<?php echo $uniqid; ?> .shop--list--bar__view-list').click(function(){
		shopUpdateListView('<?php echo $uniqid; ?>', false, 'col-md-12');
	});
});
</script>
