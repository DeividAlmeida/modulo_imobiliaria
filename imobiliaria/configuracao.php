<?php
$query = DBRead('imobiliaria_config', '*');

$config = [];
foreach ($query as $key => $row) {
  $config[$row['id']] = $row['valor'];
}
$cod_carrinho  = '<div id="ImobiliariaCarrinho" ></div>' . "\n";
$cod_carrinho .= '<script type="text/javascript">ImobiliariaCarrinho();</script>';

$cod_btn_carrinho  = '<div id="ImobiliariaBtnCarrinho" ></div>' . "\n";
$cod_btn_carrinho .= '<script type="text/javascript">ImobiliariaBtnCarrinho();</script>';

$cod_busca_buscador  = '<div id="ImobiliariaBuscador" ></div>' . "\n";
$cod_busca_buscador .= '<script type="text/javascript">ImobiliariaBuscador();</script>';

$cod_busca_resultado  = '<div id="ImobiliariaBuscaResultado" ></div>' . "\n";
$cod_busca_resultado .= '<script type="text/javascript">ImobiliariaBuscaResultado();</script>';
?>
<form id="formAtualizarConfig" method="post" action="?AtualizarConfig">
  <div class="card">
    <div class="card-header white">
      <strong>Configurar Catálogo</strong>
    </div>

    <div class="card-body">
      <button id="btnCopiarCodSite1" class="btn btn-primary btn-xs" onclick="CopiadoCodSite(1)" data-clipboard-text='<?php echo $cod_carrinho; ?>' type="button">
        <i class="icon icon-code"></i> Copiar Código Página Carrinho
      </button>

      <button id="btnCopiarCodSite2" class="btn btn-primary btn-xs" onclick="CopiadoCodSite(2)" data-clipboard-text='<?php echo $cod_btn_carrinho; ?>' type="button">
        <i class="icon icon-code"></i> Copiar Código Botão Carrinho
      </button>

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
            <label for="pagina_carrinho">Página do Carrinho:</label>
            <input type="text" name="pagina_carrinho" class="form-control" value="<?php echo $config['pagina_carrinho']; ?>">
          </div>
        </div>
      </div>

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
              <option value="1" <?php Selected($config['listagem_estilo'], '1'); ?>>Estilo 1</option>
              <option value="2" <?php Selected($config['listagem_estilo'], '2'); ?>>Estilo 2</option>
              <option value="3" <?php Selected($config['listagem_estilo'], '3'); ?>>Estilo 3</option>
              <option value="4" <?php Selected($config['listagem_estilo'], '4'); ?>>Estilo 4</option>
              <option value="5" <?php Selected($config['listagem_estilo'], '5'); ?>>Estilo 5</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
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
            <label>Cor do Filtro:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="listagem_cor_filtro" value="<?php echo $config['listagem_cor_filtro']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>

      </div>

      <hr />

      <h4>Configuração Carrocel</h4>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Botão:</label>
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
            <label>Cor do Hover do Botão:</label>
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
            <label>Cor do Texto do Botão:</label>
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
            <label>Cor do Título:</label>
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
            <label>Cor do Hover Titulo:</label>
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
            <label>Cor da Descrição:</label>
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
            <label>Cor das Setas:</label>
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
            <label>Cor do Hover das Setas:</label>
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
            <label>Cor do Preço:</label>
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
            <label>Cor do Texto do Botão:</label>
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
            <label>Cor do Botão:</label>
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
            <label>Cor do Hover do Botão:</label>
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
            <label>Cor do Texto da Descrição:</label>
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
            <label>Cor da Tag Categoria:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="imovel_cor_tag_categoria" value="<?php echo $config['imovel_cor_tag_categoria']; ?>">
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
            <label>Cor do Texto da Tag Categoria:</label>
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
      <hr />

      <h4>Configuração Carrinho</h4>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor Botões:</label>
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
            <label>Cor Botão Finalizar:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="carrinho_cor_btn_finalizar" value="<?php echo $config['carrinho_cor_btn_finalizar']; ?>">
              <span class="input-group-append">
                <span class="input-group-text add-on white">
                  <i class="circle"></i>
                </span>
              </span>
            </div>
          </div>
        </div>
      </div>

      <hr />

      <h4>Configuração Botão Carrinho</h4>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor Botão 'Meu Carrinho':</label>
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
            <label>Cor Fundo:</label>
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
            <label>Cor do Texto:</label>
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
            <label>Cor do Botão 'Ver Carrinho':</label>
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
            <label>Cor Hover do Botão 'Ver Carrinho':</label>
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
            <label>Cor do Texto do Botão 'Ver Carrinho':</label>
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
      </div>

      <hr />

      <h4>Configuração Busca</h4>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Limite de Resultado por Página:</label>
            <input type="number" name="busca_limite_pagina" class="form-control" value="<?php echo $config['busca_limite_pagina']; ?>">
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Tipo do Botão:</label>
            <select name="busca_btn_tipo" class="form-control custom-select">
              <option value="texto" <?php Selected($config['busca_btn_tipo'], 'texto'); ?>>Texto</option>
              <option value="icone" <?php Selected($config['busca_btn_tipo'], 'icone'); ?>>Ícone</option>
              <option value="ambos" <?php Selected($config['busca_btn_tipo'], 'ambos'); ?>>Ambos</option>
            </select>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Tamanho do Botão:</label>
            <select name="busca_btn_tamanho" class="form-control custom-select">
              <option value="pequeno" <?php Selected($config['busca_btn_tamanho'], 'pequeno'); ?>>Pequeno</option>
              <option value="normal" <?php Selected($config['busca_btn_tamanho'], 'normal'); ?>>Normal</option>
              <option value="grande" <?php Selected($config['busca_btn_tamanho'], 'grande'); ?>>Grande</option>
            </select>
          </div>
        </div>

        <div class="col-md-6">
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

        <div class="col-md-6">
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

        <div class="col-md-4">
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

      <hr />

      <h4>Configuração Formulário Orçamento</h4>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Tipo de Orçamento:</label>
            <select class="form-control" name="tipo_orcamento">
              <option value="email"> por E-mail</option>
              <option value="whatsapp"> por Whatsapp</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Número do Whatsapp:</label>
            <input type="number" name="whatsapp" class="form-control" placeholder="Informe seu número de whatsapp" value="<?php echo $config['whatsapp']; ?>">
            <small>Lembre-se de inserir seu número completo com Código do País, DDD e Número de Telefone completo Ex. 5511912345678</small>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>E-mail de Recebimento:</label>
            <input type="text" name="email_recebimento" class="form-control" placeholder="Informe o E-mail de Recebimento" value="<?php echo $config['email_recebimento']; ?>">
            <small>Para adicionar mais de um e-mail separe os e-mails com ; (ponto e virgula)</small>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Servidor SMTP:</label>
            <input type="text" name="email_servidor" class="form-control" placeholder="Informe o Servidor SMTP" value="<?php echo $config['email_servidor']; ?>">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Usuário SMTP:</label>
            <input type="text" name="email_usuario" class="form-control" placeholder="Informe o Usuário SMTP" value="<?php echo $config['email_usuario']; ?>">
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Senha SMTP:</label>
            <input type="text" name="email_senha" class="form-control" placeholder="Informe o Senha SMTP" value="<?php echo $config['email_senha']; ?>">
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label>Porta SMTP:</label>
            <input type="text" name="email_porta" class="form-control" placeholder="Informe a Porta SMTP" value="<?php echo $config['email_porta']; ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>E-mail de Disparo:</label>
            <input type="text" name="email_disparo" class="form-control" placeholder="Informe o E-mail de Disparo" value="<?php echo $config['email_disparo']; ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Protocolo de Segurança:</label>
            <select name="email_protocolo_seguranca" class="form-control custom-select">
              <option value="ssl" <?php Selected($config['email_protocolo_seguranca'], 'ssl'); ?>>SSL</option>
              <option value="tls" <?php Selected($config['email_protocolo_seguranca'], 'tls'); ?>>TLS</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Cor do Background:</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="email_cor_bg" value="<?php echo $config['email_cor_bg']; ?>">
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
            <label>Cor do fundo do cabeçalho :</label>
            <div class="color-picker input-group colorpicker-element focused">
              <input type="text" class="form-control" name="email_cor_header_bg" value="<?php echo $config['email_cor_header_bg']; ?>">
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
            <label>Cor do texto do cabeçalho :</label>
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
      url: "imobiliaria.php?AtualizarMatrizesTodosimoveis",
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