<?php
$query = DBRead('imobiliaria_config', '*');

$config = [];
foreach ($query as $key => $row) {
  $config[$row['id']] = $row['valor'];
}


$cod_busca_buscador  = '<div id="ImobiliariaBuscador" ></div>' . "\n";
$cod_busca_buscador .= '<script type="text/javascript">ImobiliariaBuscador();</script>';

$cod_busca_resultado  = '<div id="ImobiliariaBuscaResultado" ></div>' . "\n";
$cod_busca_resultado .= '<script type="text/javascript">ImobiliariaBuscaResultado();</script>';
?>
<form id="formAtualizarConfig" method="post" action="?AtualizarConfig">
  <div class="card">
    <div class="card-header white">
      <strong>Configurar Imobiliária</strong>
    </div>

    <div class="card-body">
      

      <button id="btnCopiarCodSite3" class="btn btn-primary btn-xs" onclick="CopiadoCodSite(3)" data-clipboard-text='<?php echo $cod_busca_buscador; ?>' type="button">
        <i class="icon icon-code"></i> Copiar Código Campo de Busca
      </button>

      <button id="btnCopiarCodSite4" class="btn btn-primary btn-xs" onclick="CopiadoCodSite(4)" data-clipboard-text='<?php echo $cod_busca_resultado; ?>' type="button">
        <i class="icon icon-code"></i> Copiar Código Página Resultado Busca
      </button>

      <button class="btn btn-primary btn-xs" onclick="AtualizarMatrizes()" type="button">
        <i class="icon icon-refresh"></i> Atualizar Matrizes da Página de Imóvel
      </button>

      <hr />


      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="pagina_carrinho">Página do Resultado da Busca:</label>
            <input type="text" name="pagina_resultado_busca" class="form-control" value="<?php echo $config['pagina_resultado_busca']; ?>">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="pagina_carrinho">Matriz Página do Imóvel:</label>
            <input type="text" name="matriz_imovel" class="form-control" value="<?php echo $config['matriz_imovel']; ?>">
          </div>
        </div>
      </div>

      <hr />

      <h4>Configuração Listagem</h4>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="listagem_estilo">Estilo da Listagem:</label>
            <select name="listagem_estilo" class="form-control custom-select">
              <option value="4" <?php Selected($config['listagem_estilo'], '4'); ?>>Estilo 1</option>
              <option value="5" <?php Selected($config['listagem_estilo'], '5'); ?>>Estilo 2</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor da Tag:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="carrocel_cor_btn" value="<?php echo $config['carrocel_cor_btn']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Texto da Tag:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="carrocel_cor_hover_btn" value="<?php echo $config['carrocel_cor_hover_btn']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Título:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="listagem_cor_titulo" value="<?php echo $config['listagem_cor_titulo']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor da Barra do Título:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="carrocel_cor_btn_texto" value="<?php echo $config['carrocel_cor_btn_texto']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Endereço:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="carrocel_cor_titulo" value="<?php echo $config['carrocel_cor_titulo']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor dos Ícones:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="carrocel_cor_hover_titulo" value="<?php echo $config['carrocel_cor_hover_titulo']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Preço:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="listagem_cor_preco" value="<?php echo $config['listagem_cor_preco']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Botão:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="listagem_cor_botao" value="<?php echo $config['listagem_cor_botao']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Texto do Botão:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="carrocel_cor_descricao" value="<?php echo $config['carrocel_cor_descricao']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Hover do Botão:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="listagem_cor_hover_botao" value="<?php echo $config['listagem_cor_hover_botao']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Texto do Hover do Botão:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="carrocel_cor_setas" value="<?php echo $config['carrocel_cor_setas']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor da Borda:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="listagem_cor_borda" value="<?php echo $config['listagem_cor_borda']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Fundo:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="carrocel_cor_hover_setas" value="<?php echo $config['carrocel_cor_hover_setas']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor Hover do Fundo:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="carrinho_cor_btns" value="<?php echo $config['carrinho_cor_btns']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Sombra:</label>
            <div class="input-group ">
                <select name="carrinho_cor_btn_finalizar" class="form-control custom-select">
                  <option value="-webkit-box-shadow: 0 2px 8px 0 rgba(0,0,0,.16);box-shadow: 0 2px 8px 0 rgba(0,0,0,.16);" <?php Selected($config['carrinho_cor_btn_finalizar'], '-webkit-box-shadow: 0 2px 8px 0 rgba(0,0,0,.16);box-shadow: 0 2px 8px 0 rgba(0,0,0,.16);'); ?>>Sim</option>
                  <option value="/*i*/" <?php Selected($config['carrinho_cor_btn_finalizar'], '/*i*/'); ?>>Não</option>
                </select>
            </div>
          </div>
        </div>

      </div>


      <hr />

      <h4>Configuração Imóvel</h4>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Título:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="imovel_cor_titulo" value="<?php echo $config['imovel_cor_titulo']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Endereço:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="imovel_cor_texto_descricao" value="<?php echo $config['imovel_cor_texto_descricao']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Sombra:</label>
            <div class="input-group ">
                <select name="imovel_cor_tag_categoria" class="form-control custom-select">
                  <option value="-webkit-box-shadow: 0 2px 8px 0 rgba(0,0,0,.16);box-shadow: 0 2px 8px 0 rgba(0,0,0,.16);" <?php Selected($config['imovel_cor_tag_categoria'], '-webkit-box-shadow: 0 2px 8px 0 rgba(0,0,0,.16);box-shadow: 0 2px 8px 0 rgba(0,0,0,.16);'); ?>>Sim</option>
                  <option value="/*i*/" <?php Selected($config['imovel_cor_tag_categoria'], '/*i*/'); ?>>Não</option>
                </select>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Fundo do Texto:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="btn_carrinho_cor_btn_meu_carrinho" value="<?php echo $config['btn_carrinho_cor_btn_meu_carrinho']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>


        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Texto Valor:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="imovel_cor_preco" value="<?php echo $config['imovel_cor_preco']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Cor Texto Adicional:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="btn_carrinho_cor_fundo" value="<?php echo $config['btn_carrinho_cor_fundo']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Botão 1:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="imovel_cor_botao" value="<?php echo $config['imovel_cor_botao']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Texto do Botão 1:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="imovel_cor_texto_botao" value="<?php echo $config['imovel_cor_texto_botao']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Hover do Botão 1:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="imovel_cor_hover_botao" value="<?php echo $config['imovel_cor_hover_botao']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Cor Hover Texto Botão 1:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="btn_carrinho_cor_texto" value="<?php echo $config['btn_carrinho_cor_texto']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Botão 2:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="btn_carrinho_cor_btn_ver_carrinho" value="<?php echo $config['btn_carrinho_cor_btn_ver_carrinho']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Texto do Botão 2:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="btn_carrinho_cor_hover_btn_ver_carrinho" value="<?php echo $config['btn_carrinho_cor_hover_btn_ver_carrinho']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Hover do Botão 2:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="btn_carrinho_cor_texto_btn_ver_carrinho" value="<?php echo $config['btn_carrinho_cor_texto_btn_ver_carrinho']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Cor Hover Texto Botão 2:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="imovel_cor_texto_tag_categoria" value="<?php echo $config['imovel_cor_texto_tag_categoria']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor dos Ícones:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="email_cor_header_texto" value="<?php echo $config['email_cor_header_texto']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
        

        <div class="col-md-4">
          <div class="form-group">
            <label>Moeda:</label>
            <div class="input-group focused">
              <select class="form-control" name="moeda" data-selected="<?= $config['moeda']; ?>">
                <option value="R&#x00024;">R&#x00024; Reais</option>
                <option value="&#x00024;">&#x00024; Dólar</option>
                <option value="&#8364;">&#8364; Euro</option>
              </select>
            </div>
          </div>
        </div>
      </div>
   <h4>Configuração Busca</h4>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>Limite de Resultado por Página:</label>
            <input type="number" name="busca_limite_pagina" class="form-control" value="<?php echo $config['busca_limite_pagina']; ?>">
          </div>
        </div>


        <div class="col-md-3">
          <div class="form-group">
            <label>Cor do Botão:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="busca_btn_cor" value="<?php echo $config['busca_btn_cor']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label>Cor do Hover do Botão:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="busca_btn_cor_hover" value="<?php echo $config['busca_btn_cor_hover']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label>Cor do Texto do Botão:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="busca_btn_cor_texto" value="<?php echo $config['busca_btn_cor_texto']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
      </div>


    </div>

    <div class="card-footer white">
      <button class="btn btn-primary float-right" type="submit">Atualizar</button>
    </div>
  </div>
</form>


<script type="text/javascript">
  function AtualizarMatrizes() {
    $.ajax({
      type: "GET",
      cache: false,
      url: "imobiliaria.php?AtualizarMatrizesTodosImoveis",
      beforeSend: function(data) {
        swal({
          title: 'Aguarde!',
          text: 'Estamos gerando as páginas dos imóveis atualizadas.\nNão recarregue a página até a mensagem de sucesso.',
          type: "info",
          html: true,
          showConfirmButton: true
        });
      },
      complete: function(data) {
        swal("Matrizes Atualizadas!", "Matrizes atualizadas com sucesso!", "success")
      }
    });
  }
</script>


