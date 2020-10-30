<?php
  if(!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'imovel', 'adicionar')){ Redireciona('./index.php'); }
?>
<?php 
$categorias = DBRead('imobiliaria_categorias','*'); 
$cidades = DBRead('imobiliaria_cidades','*');
$imoveis = DBRead('imobiliaria','*'); 
?>
<form method="post" action="?AddImovel" enctype="multipart/form-data">
  <div class="card">
    <div class="card-header  white">
      <strong>Cadastrar Imóvel</strong>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <!-- `nome` varchar(255) NOT NULL --> 
          <div class="form-group">
            <label>Nome: </label>
            <input class="form-control imovel-nome" name="nome" required>
          </div>

          <!-- `descricao` text DEFAULT NULL -->
          <div class="form-group">
            <label>Descrição: </label>
            <textarea class="form-control tinymce" name="descricao_imov"></textarea>
          </div>
        </div>
        <div class="col-md-6">

          <!-- `resumo` text DEFAULT NULL -->
          <div class="form-group">
            <label>Resumo: </label>
            <textarea class="form-control" name="resumo"></textarea>
          </div>

          <!-- `codigo` varchar(255) NOT NULL -->
          <div class="form-group">
            <label>Código do Imóvel: </label>
            <input class="form-control" name="codigo" required>
          </div>

          <!-- `url` varchar(255) NOT NULL -->
          <div class="form-group">
            <label>URL amigável: </label>
            <input class="form-control imovel-url" name="url" required>
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
            <input class="form-control" name="preco" type="number" required min="0" step="0.01">
          </div>
          
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
          
						<!-- `preco` decimal(10,2) NOT NULL -->
          <div class="form-group">
            <label>Imóveis Relacionados: </label>
            <select class="form-control imovel-categorias" name="imoveis_relacionados[]" multiple="multiple">
              <?php foreach($imoveis as $imoveis){ ?>
                <option value="<?php echo $imoveis['id']; ?>"><?php echo $imoveis['nome']; ?></option>
              <?php } ?>
            </select>
          </div>
            <div class="row">
              <!-- `tamanho` decimal(10,2) NULL -->
              <div class="col-md-3">
                <label>Tamanho: <i class="icon icon-question-circle tooltips" data-tooltip="Unidade de media (m²)"><span class="inner">Unidade de media (Kg)</span></i> </label>
                <input class="form-control" name="tamanho" type="number" required min="1" step="0.01">
              </div>
    
              <!-- `quartos` decimal(10,2) NULL -->
              <div class=" col-md-3">
                <label>Quartos: </label>
                <input class="form-control" name="quartos" type="number" required min="0" step="any">
              </div>
            
              <!-- `andar` decimal(10,2) NULL -->
              <div class="col-md-3">
                <label>Andar: </label>
                <input class="form-control" name="andar" type="number" min="0" step="any">
              </div>
    
              <!-- `banheiros` decimal(10,2) NULL -->
              <div class="col-md-3">
                <label>Banheiros: </label>
                <input class="form-control" name="banheiros" type="number" required min="0" step="any" >
              </div>
            </div>
        </div>
        
        
        
      </div>
      <div class="row">
			<!-- `garagem` text DEFAULT NULL -->
       <div class="col-md-2">
  				<input type="checkbox" name="garagem" id="garagem" value="checked" >
					<label for="garagem" style="cursor:pointer">Vaga garagem</label>								
			 </div>	
			 <!-- `mobiliado` text DEFAULT NULL -->
			 <div class="col-md-2">		
  				<input type="checkbox" name="mobiliado" id="mobiliado" value="checked">
					<label for="mobiliado" style="cursor:pointer">Mobiliado</label>								
				</div>
				<!-- `pet` text DEFAULT NULL -->	
				<div class="col-md-2">		
  				<input type="checkbox" name="pet" id="pet" value="checked">
					<label for="pet" style="cursor:pointer">Aceita Pet</label>								
				</div>
				<!-- `sol` text DEFAULT NULL -->
				<div class="col-md-2">		
  				<input type="checkbox" name="sol" id="sol" value="checked">
					<label for="sol" style="cursor:pointer">Sol da manhã</label>								
				</div>
				<!-- `livre` text DEFAULT NULL -->
				<div class="col-md-2">		
  				<input type="checkbox" name="livre" id="livre" value="checked">
					<label for="livre" style="cursor:pointer">Vista Livre</label>								
				</div>
				<!-- `metro` text DEFAULT NULL -->
				<div class="col-md-2">		
  				<input type="checkbox" name="metro" id="metro" value="checked">
					<label for="metro" style="cursor:pointer">Metrô próximo</label>								
				</div>

      </div><br>
      <div class="row">
        <div class="col-md-12">
          <!-- `palavras_chave` text NOT NULL -->
          <div class="form-group">
            <label>Palavras Chave: </label>
            <textarea class="form-control" name="palavras_chave"></textarea>
          </div>

          <!-- `etiqueta` varchar(255) DEFAULT NULL -->
          <div class="form-group">
            <label>Etiqueta: </label>
            <input class="form-control" name="etiqueta">
          </div>

          <!-- `etiqueta_cor` varchar(255) DEFAULT NULL -->
          <div class="form-group">
            <label for="name">Cor da Etiqueta: </label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="etiqueta_cor">
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
              <option value="N" selected>Não</option>
              <option value="S">Sim</option>
            </select>
          </div>

          <!-- `tipo` enum('orcamento', 'venda') NOT NULL PAGADO-->
          <div class="form-group d-none">
            <label>Tipo:</label>
            <select name="tipo" required class="form-control custom-select">
              <option value="orcamento" selected>Orçamento</option>
              <option value="venda">Para Venda</option>
            </select>
          </div>

          <!-- `link_venda` varchar(255) DEFAULT NULL -->
          <div class="form-group">
            <label>Link contato: </label>
            <input class="form-control" name="link_venda" >
          </div>

          <div class="form-group">
            <label>Link mapa: </label>
            <input class="form-control" name="link_mapa" >
          </div>

          <!-- `target_link` enum('_self','_blank') NOT NULL DEFAULT '_self' -->
          <div class="form-group">
            <label>Abrir links em: </label>
            <select name="target_link" required class="form-control custom-select">
              <option value="_blank" selected>Nova Aba</option>
              <option value="_self">Mesma aba</option>
            </select>
          </div>
          
          <!-- `acao` varchar(255) DEFAULT NULL DEFAULT '_self' -->
          <div class="form-group">
            <label>Ação: </label>
            <select name="acao" required class="form-control custom-select">
              <option value="alugar" selected>Alugar</option>
              <option value="comprar">Vender</option>
            </select>
          </div>

          <!-- `btn_texto` varchar(255) DEFAULT NULL -->
          <div class="form-group d-none">
            <label>Texto do Botão: </label>
            <input class="form-control" name="btn_texto" >
          </div>

          <!-- `ordem_manual` int(11) -->
          <div class="form-group d-none">
            <label>Ordem Manual: </label>
            <input class="form-control" name="ordem_manual" type="number" value="0">
          </div>
        </div>
        <div class="col-md-12">
          <hr/>
          <a id="imovel-add-foto" class="btn btn-primary">Adicionar foto</a>

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

          <button class="btnSubmit btn btn-primary float-right" type="submit">Cadastrar</button>
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
                <select name="cidade" required class="form-control custom-select">
                    <option value="" disabled selected>Cidade</option>
                    <?php foreach($cidades as $chave => $cidade){ ?>
                    <option value="<?php echo $cidade['nome']; ?>" <?php Selected($cidade['nome']); ?>><?php echo $cidade['nome']; ?></option>
                    <?php } ?>
                </select>
            </div>
                  <div class="row">
        <div class="col-md-4">
          <!-- `estado` varchar(255) DEFAULT NULL -->
          <div class="form-group">
                <label>Estado: </label>
                <select name="estado" class="form-control custom-select" required>
                    <option value="" disabled selected>Estado</option>
                    <option value="AC" >Acre</option>
                    <option value="AL" >Alagoas</option>
                    <option value="AP" >Amapá</option>
                    <option value="AM" >Amazonas</option>
                    <option value="BA" >Bahia</option>
                    <option value="CE" >Ceará</option>
                    <option value="DF" >Distrito Federal</option>
                    <option value="ES" >Espírito Santo</option>
                    <option value="GO" >Goiás</option>
                    <option value="MA" >Maranhão</option>
                    <option value="MT" >Mato Grosso</option>
                    <option value="MS" >Mato Grosso do Sul</option>
                    <option value="MG" >Minas Gerais</option>
                    <option value="PA" >Pará</option>
                    <option value="PB" >Paraíba</option>
                    <option value="PR" >Paraná</option>
                    <option value="PE" >Pernambuco</option>
                    <option value="PI" >Piauí</option>
                    <option value="RJ" >Rio de Janeiro</option>
                    <option value="RN" >Rio Grande do Norte</option>
                    <option value="RS" >Rio Grande do Sul</option>
                    <option value="RO" >Rondônia</option>
                    <option value="RR" >Roraima</option>
                    <option value="SC" >Santa Catarina</option>
                    <option value="SP" >São Paulo</option>
                    <option value="SE" >Sergipe</option>
                    <option value="TO" >Tocantins</option>
                </select>
              </div>
            </div>
            
            <!-- `bairro` varchar(255) DEFAULT NULL -->
            <div class="col-md-4">
              <div class="form-group">
                <label>Bairro: </label>
                <input class="form-control" name="bairro" required>
              </div>        
            </div>
            <!-- `rua` varchar(255) DEFAULT NULL -->
            <div class="col-md-4">
              <div class="form-group">
                <label>Rua: </label>
                <input class="form-control" name="rua" required>
              </div>        
            </div>
        </div> 
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Salvar</button>
          </div>
        </div>
      </div>
    </div>
</form>

