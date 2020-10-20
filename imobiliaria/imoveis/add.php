<?php
  if(!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'imovel', 'adicionar')){ Redireciona('./index.php'); }
?>
<?php $categorias = DBRead('imobiliaria_categorias','*'); ?>
<?php $imoveis = DBRead('imobiliaria','*'); ?>
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
            <textarea class="form-control tinymce" name="descricao"></textarea>
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
            <select class="form-control imovel-categorias" name="categorias[]" multiple="multiple" >
              <?php foreach($categorias as $categoria){ ?>
                <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nome']; ?></option>
              <?php } ?>
            </select>
          </div>

          <!-- `preco` decimal(10,2) NOT NULL -->
          <div class="form-group">
            <label>Preço: </label>
            <input class="form-control" name="preco" type="number" required min="0" step="0.01">
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

          <!-- `tamanho` decimal(10,2) NULL -->
          <div class="form-group">
            <label>Tamanho: <i class="icon icon-question-circle tooltips" data-tooltip="Unidade de media (m²)"><span class="inner">Unidade de media (Kg)</span></i> </label>
            <input class="form-control" name="tamanho" type="number" required min="1" step="0.01">
          </div>

          <!-- `quartos` decimal(10,2) NULL -->
          <div class="form-group">
            <label>Quantidade de quartos: </label>
            <input class="form-control" name="quartos" type="number" required min="0" step="any">
          </div>

          <!-- `andar` decimal(10,2) NULL -->
          <div class="form-group">
            <label>Andar: </label>
            <input class="form-control" name="andar" type="number" min="0" step="any">
          </div>

          <!-- `banheiros` decimal(10,2) NULL -->
          <div class="form-group">
            <label>Quantidade de banheiros: </label>
            <input class="form-control" name="banheiros" type="number" required min="0" step="any" >
          </div>
        </div>
      </div><br>
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
            <label>Link venda: </label>
            <input class="form-control" name="link_venda" disabled>
          </div>

          <!-- `target_link` enum('_self','_blank') NOT NULL DEFAULT '_self' -->
          <div class="form-group">
            <label>Abrir link em: </label>
            <select name="target_link" required class="form-control custom-select">
              <option value="_blank" selected>Nova Aba</option>
              <option value="_self">Mesma aba</option>
            </select>
          </div>

          <!-- `btn_texto` varchar(255) DEFAULT NULL -->
          <div class="form-group">
            <label>Texto do Botão: </label>
            <input class="form-control" name="btn_texto" required>
          </div>

          <!-- `ordem_manual` int(11) -->
          <div class="form-group">
            <label>Ordem Manual: </label>
            <input class="form-control" name="ordem_manual" type="number">
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
</form>
