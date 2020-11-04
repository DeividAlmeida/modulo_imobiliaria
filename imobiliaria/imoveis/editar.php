<?php
  if(!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'imovel', 'editar')){ Redireciona('./index.php'); }
?>
<?php
$cidades = DBRead('imobiliaria_cidades','*');

function Checked($query, $value = null){
  if ($query == $value) { echo "checked"; }
}

$id       = get('EditarImovel');

// Busca de categorias e imoveis
$categorias = DBRead('imobiliaria_categorias','*');
$imoveis   = DBRead('imobiliaria','*');


$query   = DBRead('imobiliaria','*',"WHERE id = '{$id}'");
$dados   = $query[0];
$bairros = DBRead('imobiliaria_bairros','*', "WHERE cidade = '{$dados['cidade']}'");
$fotos   = DBRead('imobiliaria_imov_imagens','*', "WHERE id_imovel = {$id}");

// Busca pela foto de capa e salva em variavel
if(is_array($fotos)){
  foreach($fotos as $foto){
    if($foto['id'] == $dados['id_imagem_capa']){
      $foto_capa = $foto;
    }
  }
}

// Buscando as categorias do imovel
$lista_ids_categorias = DBRead('imobiliaria_imov_categorias', 'id_categoria', "WHERE id_imovel = {$id}");

// Varre todos os ID de categoria da lista, cria uma array, e transforma logo em seguida em uma string
$ids_categorias = array();
foreach ($lista_ids_categorias as $linha) {
  array_push($ids_categorias, $linha['id_categoria']);
}
$string_ids_categorias = implode(",", $ids_categorias);


// Buscando as categorias do imovel
$lista_ids_imov_relacionado = DBRead('imobiliaria_imov_relacionados', 'id_imovel_relacionado', "WHERE id_imovel = {$id}");

// Varre todos os ID de imov_relacionado d a lista, cria uma array, e transforma logo em seguida em uma string
$ids_imov_relacionado = array();
if(is_array($lista_ids_imov_relacionado)){
  foreach ($lista_ids_imov_relacionado as $linha) {
    array_push($ids_imov_relacionado, $linha['id_imovel_relacionado']);
  }
}
$string_ids_imov_relacionado  = implode(",", $ids_imov_relacionado);

if (is_array($query)) { ?>
  <form method="post" action="?AtualizarImovel=<?php echo $id; ?>" enctype="multipart/form-data">
    <div class="card">
      <div class="card-header  white">
        <strong>Editar Imóvel</strong>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <!-- `nome` varchar(255) NOT NULL -->
            <div class="form-group">
              <label>Nome: </label>
              <input class="form-control imovel-nome" name="nome" required value="<?php echo $dados['nome'];?>">
            </div>

            <!-- `descricao` text DEFAULT NULL -->
            <div class="form-group">
              <label>Descrição: </label>
              <textarea class="form-control tinymce" name="descricao_imov"><?php echo $dados['descricao'];?></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <!-- `resumo` text DEFAULT NULL -->
            <div class="form-group">
              <label>Resumo: </label>
              <textarea class="form-control" name="resumo"><?php echo $dados['resumo'];?></textarea>
            </div>

            <!-- `codigo` varchar(255) NOT NULL -->
            <div class="form-group">
              <label>Código do Imóvel: </label>
              <input class="form-control" name="codigo" required value="<?php echo $dados['codigo'];?>">
            </div>

            <!-- `url` varchar(255) NOT NULL -->
            <div class="form-group">
              <label>URL amigável: </label>
              <input class="form-control imovel-url" name="url" required value="<?php echo $dados['url'];?>">
            </div>

            <!-- `categorias` -->
            <div class="form-group">
              <label>Categorias: </label>
              <select class="form-control imovel-categorias" name="categorias[]" multiple="multiple" required>
                <?php foreach($categorias as $categoria){ ?>
                  <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nome']; ?></option>
                <?php } ?>
              </select>
            </div>
          <!-- ADD Cidade -->
          <div class="form-group">
            <bottom class="btn btn-primary btnAdd" data-toggle="modal" data-target="#exampleModal"> Adicionar Cidade</bottom>
          </div>

            <!-- `preco` decimal(10,2) NOT NULL -->
            <div class="form-group">
              <label>Preço: </label>
              <input class="form-control" name="preco" type="number" required min="0" step="0.01" value="<?php echo $dados['preco'];?>">
            </div>
            <div id="input_group">
            <?php $reads = json_decode($dados['taxas'], true); if(is_array($reads)): foreach($reads as $key => $read):  ?> 
                <button type="button" class="btn btn-primary btnAdd" style="margin-bottom: 15px;"><i class="icons icon-plus"></i></button>
              <div class="groupItens">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="usuario">Descrição:</label>
                      <input  type="text" name="descricao[]"  class="form-control" placeholder="Ex.: IPTU"  value="<?php echo $read['descricao'];?>">
                    </div>
                    <div class="col-md-4">
                      <label for="usuario">Valor:</label>
                      <input  type="number" name="taxa[]" min="0" step="0.01" class="form-control" placeholder="Ex.: 99.99" value="<?php echo $read['taxa'];?>" >
                    </div>
                    <div class="col-md-2">
                      <label ></label><br>
                        <a type="submit"  class="form-control btn btn-danger btnRemove" style="display: inline !important;"><i class="icon-trash"></i></a>
                    </div> 
                  </div>    
                </div>
              </div> 
            
            <?php endforeach; else : ?>
              <div id="input_group">
              <button type="button" class="btn btn-primary btnAdd" style="margin-bottom: 15px;"><i class="icons icon-plus"></i></button>  
              <div class="groupItens">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="usuario">Descrição:</label>
                      <input  type="text" name="descricao[]" min="0" step="0.01" class="form-control" placeholder="Ex.: IPTU"  >
                    </div>
                    <div class="col-md-4">
                      <label for="usuario">Valor:</label>
                      <input  type="number" name="taxa[]" min="0" step="0.01" class="form-control" placeholder="Ex.: 99.99"  >
                    </div>
                    <div class="col-md-2">
                      <label ></label><br>
                        <a type="submit"  class="form-control btn btn-danger btnRemove" style="display: inline !important;"><i class="icon-trash"></i></a>
                    </div> 
                  </div>    
                </div>
              </div> 
            </div>
            <?php endif; ?>
          </div>
            <div class="form-group">
              <label>Imóveis Relacionados: </label>
              <select class="form-control imovel-imov_relacionados" name="imoveis_relacionados[]" multiple="multiple">
                <?php foreach($imoveis as $imoveis){ ?>
                  <option value="<?php echo $imoveis['id']; ?>"><?php echo $imoveis['nome']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="row">
              <!-- `tamanho` decimal(10,2) NULL -->
              <div class="col-md-3">
                <label>Tamanho: <i class="icon icon-question-circle tooltips" data-tooltip="Unidade de media (m²)"><span class="inner">Unidade de media (Kg)</span></i> </label>
                <input class="form-control" name="tamanho" type="number" required min="1" step="0.01" value="<?php echo $dados['tamanho'];?>">
              </div>
    
              <!-- `quartos` decimal(10,2) NULL -->
              <div class="col-md-3">
                <label>Quartos: </label>
                <input class="form-control" name="quartos" type="number" required min="0" step="any" value="<?php echo $dados['quartos'];?>">
              </div>
    
              <!-- `andar` decimal(10,2) NULL -->
              <div class="col-md-3">
                <label>Andar: </label>
                <input class="form-control" name="andar" type="number" min="0" step="any" value="<?php echo $dados['andar'];?>">
              </div>
    
              <!-- `banheiros` decimal(10,2) NULL -->
            <div class="col-md-3">
                <label>Banheiros: </label>
                <input class="form-control" name="banheiros" type="number" required min="0" step="any" value="<?php echo $dados['banheiros'];?>">
              </div>
          </div>
        </div>
      </div>  <br>    
      <div class="row">
			<!-- `garagem` text DEFAULT NULL -->
       <div class="col-md-2">
  				<input type="checkbox" <?php echo $dados['garagem'];?> name="garagem" id="garagem" value="checked" >
					<label for="garagem" style="cursor:pointer">Vaga garagem</label>								
			 </div>	
			 <!-- `mobiliado` text DEFAULT NULL -->
			 <div class="col-md-2">		
  				<input type="checkbox" <?php echo $dados['mobiliado'];?> name="mobiliado" id="mobiliado" value="checked">
					<label for="mobiliado" style="cursor:pointer">Mobiliado</label>								
				</div>
				<!-- `pet` text DEFAULT NULL -->	
				<div class="col-md-2">		
  				<input type="checkbox" <?php echo $dados['pet'];?> name="pet" id="pet" value="checked">
					<label for="pet" style="cursor:pointer">Aceita Pet</label>								
				</div>
				<!-- `sol` text DEFAULT NULL -->
				<div class="col-md-2">		
  				<input type="checkbox" <?php echo $dados['sol'];?> name="sol" id="sol" value="checked">
					<label for="sol" style="cursor:pointer">Sol da manhã</label>								
				</div>
				<!-- `livre` text DEFAULT NULL -->
				<div class="col-md-2">		
  				<input type="checkbox" <?php echo $dados['livre'];?> name="livre" id="livre" value="checked">
					<label for="livre" style="cursor:pointer">Vista Livre</label>								
				</div>
				<!-- `metro` text DEFAULT NULL -->
				<div class="col-md-2">		
  				<input type="checkbox" <?php echo $dados['metro'];?> name="metro" id="metro" value="checked">
					<label for="metro" style="cursor:pointer">Metrô próximo</label>								
				</div>

      </div><br>
        <div class="row">
          <div class="col-md-12">
            <!-- `palavras_chave` text NOT NULL -->
            <div class="form-group">
              <label>Palavras Chave: </label>
              <textarea class="form-control" name="palavras_chave"><?php echo $dados['palavras_chave'];?></textarea>
            </div>

            <!-- `etiqueta` varchar(255) DEFAULT NULL -->
            <div class="form-group">
              <label>Etiqueta: </label>
              <input class="form-control" name="etiqueta" value="<?php echo $dados['etiqueta'];?>">
            </div>

            <!-- `etiqueta_cor` varchar(255) DEFAULT NULL -->
            <div class="form-group">
              <label for="name">Cor da Etiqueta: </label>
              <div class="color-picker input-group colorpicker-element focused">
                <input type="text" class="form-control" name="etiqueta_cor" value="<?php echo $dados['etiqueta_cor'];?>">
                <span class="input-group-append">
                  <span class="input-group-text add-on white">
                    <i class="circle"></i>
                  </span>
                </span>
              </div>
            </div>

            <!-- `a_consultar` enum('S', 'N') DEFAULT 'N' -->
            <div class="form-group">
              <label>A consultar:</label>
              <select name="a_consultar" required class="form-control custom-select">
                <option value="N" <?php Selected($dados['a_consultar'], "N"); ?>>Não</option>
                <option value="S" <?php Selected($dados['a_consultar'], "S"); ?>>Sim</option>
              </select>
            </div>

            <!-- `tipo` enum('orcamento', 'venda') NOT NULL -->
            <div class="form-group d-none">
              <label>Tipo:</label>
              <select name="tipo" required class="form-control custom-select">
                <option value="orcamento" <?php Selected($dados['tipo'], "orcamento"); ?>>Orçamento</option>
                <option value="venda" <?php Selected($dados['tipo'], "venda"); ?>>Para Venda</option>
              </select>
            </div>

            <!-- `link_venda` varchar(255) DEFAULT NULL -->
            <div class="form-group">
              <label>Link venda: </label>
              <input class="form-control" name="link_venda" value="<?php echo $dados['link_venda'];?>">
            </div>

          <div class="form-group">
              <label>Link mapa: </label>
              <input class="form-control" name="link_mapa" value="<?php echo $dados['link_mapa'];?>">
          </div>

            <!-- `target_link` enum('_self','_blank') NOT NULL DEFAULT '_self' -->
            <div class="form-group">
              <label>Abrir links em: </label>
              <select name="target_link" required class="form-control custom-select">
                <option value="_blank" <?php Selected($dados['target_link'], "_blank"); ?>>Nova Aba</option>
                <option value="_self" <?php Selected($dados['target_link'], "_self"); ?>>Mesma aba</option>
              </select>
            </div>

            <!-- `btn_texto` varchar(255) DEFAULT NULL -->
            <div class="form-group d-none">
              <label>Texto do Botão: </label>
              <input class="form-control" name="btn_texto"  value="<?php echo $dados['btn_texto'];?>">
            </div>

          <!-- `acao` varchar(255) DEFAULT NULL DEFAULT '_self' -->
          <div class="form-group">
            <label>Ação: </label>
            <select name="acao" required class="form-control custom-select">
              <option value="alugar" <?php Selected($dados['acao'], "alugar"); ?>>Alugar</option>
              <option value="comprar" <?php Selected($dados['acao'], "comprar"); ?>>Vender</option>
            </select>
          </div>

            <!-- `ordem_manual` int(11) -->
            <div class="form-group d-none">
              <label>Ordem Manual: </label>
              <input class="form-control" name="ordem_manual" type="number" value="<?php echo $dados['ordem_manual'];?>">
            </div>
          </div>
          <hr/>
          <div class="col-md-12">
            <h3>Fotos adicionadas</h3>

            <table id="fotos-adicionadas-wrapper" class="table mt-3 table-striped">
              <thead>
                <tr>
                  <th>Foto</th>
                  <th>Capa</th>
                  <th width="53px">Ações</th>
                </tr>
              </thead>

              <tbody>
                <?php if(is_array($fotos)){ foreach($fotos as $foto){ ?>
                  <tr id='foto-<?php echo $foto['id']; ?>'>
  					<td><img src="<?php echo RemoveHttpS(ConfigPainel('base_url'))."wa/imobiliaria/uploads/".$foto['uniq']; ?>" height="100"/></td>
  					<td><input class='form-check-input' name='capa' type='radio' value='old-<?php echo $foto['id']; ?>' required  <?php Checked($dados['id_imagem_capa'], $foto['id']); ?>> Capa do imovel</td>
  					<td><button type='button' class='imovel-rem-form btn btn-sm btn-danger float-right' onclick="ExcluirFotoImovel(<?php echo $foto['id']; ?>);">Excluir</button></td>
  				</tr>
                <?php } } ?>
              </tbody>
            </table>
          </div>
          <hr/>
          <div class="col-md-12">
            <h3>Adicionar novas fotos</h3> <a id="imovel-add-foto" class="btn btn-primary">Adicionar foto</a>

            <table id="foto-wrapper" class="table mt-3 table-striped">
              <thead>
                <tr>
                  <th>Arquivo</th>
                  <th>Capa</th>
                  <th width="53px">Ações</th>
                </tr>
              </thead>

              <tbody></tbody>
            </table>

            <button class="btnSubmit btn btn-primary float-right" type="submit">Editar Imóvel</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header r-0 bg-primary">
            <h5 class="modal-title text-white" id="exampleModalLabel">Adiciona o endereço</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label>Cidade:</label>
                <!-- `cidade` varchar(255) DEFAULT NULL -->
                <select name="cidade" onchange="bairros(this.value)" required class="form-control custom-select">
                    <?php foreach($cidades as $chave => $cidade){ ?>
                    <option value="<?php echo $cidade['nome']; ?>" <?php Selected($dados['cidade'], $cidade['nome']); ?>><?php echo $cidade['nome']; ?></option>
                    <?php } ?>
                </select>
            </div>
                  <div class="row">
        <div class="col-md-4">
          <!-- `estado` varchar(255) DEFAULT NULL -->
          <div class="form-group">
                <label>Estado: </label>
                <select name="estado" class="form-control custom-select" required>
                    <option value="AC" <?php Selected($dados['estado'], "AC"); ?>>Acre</option>
                    <option value="AL" <?php Selected($dados['estado'], "AL"); ?>>Alagoas</option>
                    <option value="AP" <?php Selected($dados['estado'], "AP"); ?>>Amapá</option>
                    <option value="AM" <?php Selected($dados['estado'], "AM"); ?>>Amazonas</option>
                    <option value="BA" <?php Selected($dados['estado'], "BA"); ?>>Bahia</option>
                    <option value="CE" <?php Selected($dados['estado'], "CE"); ?>>Ceará</option>
                    <option value="DF" <?php Selected($dados['estado'], "DF"); ?>>Distrito Federal</option>
                    <option value="ES" <?php Selected($dados['estado'], "ES"); ?>>Espírito Santo</option>
                    <option value="GO" <?php Selected($dados['estado'], "GO"); ?>>Goiás</option>
                    <option value="MA" <?php Selected($dados['estado'], "MA"); ?>>Maranhão</option>
                    <option value="MT" <?php Selected($dados['estado'], "MT"); ?>>Mato Grosso</option>
                    <option value="MS" <?php Selected($dados['estado'], "MS"); ?>>Mato Grosso do Sul</option>
                    <option value="MG" <?php Selected($dados['estado'], "MG"); ?>>Minas Gerais</option>
                    <option value="PA" <?php Selected($dados['estado'], "PA"); ?>>Pará</option>
                    <option value="PB" <?php Selected($dados['estado'], "PB"); ?>>Paraíba</option>
                    <option value="PR" <?php Selected($dados['estado'], "PR"); ?>>Paraná</option>
                    <option value="PE" <?php Selected($dados['estado'], "PE"); ?>>Pernambuco</option>
                    <option value="PI" <?php Selected($dados['estado'], "PI"); ?>>Piauí</option>
                    <option value="RJ" <?php Selected($dados['estado'], "RJ"); ?>>Rio de Janeiro</option>
                    <option value="RN" <?php Selected($dados['estado'], "RN"); ?>>Rio Grande do Norte</option>
                    <option value="RS" <?php Selected($dados['estado'], "RS"); ?>>Rio Grande do Sul</option>
                    <option value="RO" <?php Selected($dados['estado'], "RO"); ?>>Rondônia</option>
                    <option value="RR" <?php Selected($dados['estado'], "RR"); ?>>Roraima</option>
                    <option value="SC" <?php Selected($dados['estado'], "SC"); ?>>Santa Catarina</option>
                    <option value="SP" <?php Selected($dados['estado'], "SP"); ?>>São Paulo</option>
                    <option value="SE" <?php Selected($dados['estado'], "SE"); ?>>Sergipe</option>
                    <option value="TO" <?php Selected($dados['estado'], "TO"); ?>>Tocantins</option>
                </select>
              </div>
            </div>
            
            <!-- `bairro` varchar(255) DEFAULT NULL -->
            <div class="col-md-4">
                
              <div class="form-group">
                <label>Bairro: </label>
                <span id="bairros_filtrados">
                    <select name="bairro" required class="form-control custom-select">
                        <?php foreach($bairros as $chave => $bairro){ ?>
                        <option value="<?php echo $bairro['bairro']; ?>" <?php Selected($dados['bairro'], $bairro['bairro']); ?>><?php echo $bairro['bairro']; ?></option>
                        <?php } ?>
                    </select>
                </span>
              </div>        
            </div>
            <!-- `rua` varchar(255) DEFAULT NULL -->
            <div class="col-md-4">
              <div class="form-group">
                <label>Rua: </label>
                <input class="form-control" name="rua" required value="<?php echo $dados['rua'];?>">
              </div>        
            </div>
        </div> 
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Salvar</button>
          </div>
        </div>
      </div>
      <script>
        function bairros(f){
            fetch('./wa/imobiliaria/listagem/bairro_api.php?cidade='+f).then((prom)=>{
                prom.text().then((dados)=>{
                    
                    if(dados == ""){
                        document.getElementById('bairros_filtrados').innerHTML = "<br>Nenhum bairro cadastrado nessa cidade." ;
                    }else{
                        document.getElementById('bairros_filtrados').innerHTML = dados ;
                    }
           
                })
            });
        }
    </script>
    </div>
  </form>
<?php } ?>
