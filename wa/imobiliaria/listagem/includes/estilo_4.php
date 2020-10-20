<!-- External Css -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<style>
.swal2-popup{
  font-size: 14px !important;
}
.shop--modal-add-imovel__btn{
  border: 0 !important;
  margin-top:10px !important;
  background-color: <?php echo $config['carrinho_cor_btns']; ?> !important;
}

#shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper {
  background: #ffffff;
  overflow: hidden;
  position: relative;
  margin: 15px 0;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__name {
  color: #383838;
  font-size: 16px;
  font-weight: 400;
  margin-bottom: 6px;
  padding: 0;
  float: left;
  width: 100%;
  overflow: hidden;
  text-overflow: ellipsis;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__name a {
  white-space: nowrap;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__price {
  color: #383838;
  font-size: 20px;
  font-weight: 600;
  margin: 0;
  padding: 0 0 10px;
  clear: both;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__price a {
  white-space: nowrap;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__tag {
  background-color: #666;
  border-radius: 100%;
  color: #fff;
  display: inline-block;
  font-size: 12px;
  font-weight: bold;
  height: 40px;
  left: 20px;
  letter-spacing: 1px;
  line-height: 40px;
  position: absolute;
  text-align: center;
  text-transform: uppercase;
  top: 20px;
  width: 40px;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__img img {
  max-width: 100%;
  max-height: 100%;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__secondary-img{
  left: 0;
  opacity: 0;
  position: absolute;
  right: 0;
  top: 0;
  transition: all 500ms ease-in-out 0s;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper:hover .shop--imovel__img{
  opacity: 0.8;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__content{
  position: relative;
  text-align: center;
  padding: 10px 20px;
  margin-top: 10px;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__info, #shop--list<?php echo $uniqid; ?> .shop--imovel__action{
  position: relative;
  width: 100%;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper .btn-buy{
  display:none;
  border-radius: 0px;
  position: absolute;
  bottom: 0px;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper:hover .btn-buy{
  display: block;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper:hover{
  -webkit-box-shadow: 0px 0px 9px 0px rgba(0,0,0,.16);
  -moz-box-shadow: 0px 0px 9px 0px rgba(0,0,0,.16);
  box-shadow: 0px 0px 9px 0px rgba(0,0,0,.16);
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper .btn-see{
  text-decoration: none !important;
  border-bottom: 2px solid #000;
  font-size: 14px;
  line-height: 24px;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__name a{
  color: <?php echo $config['listagem_cor_titulo']; ?> !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__price{
  color: <?php echo $config['listagem_cor_preco']; ?> !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__content{
  border: 1px solid <?php echo $config['listagem_cor_borda']; ?> !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper .btn-buy{
  border-color: <?php echo $config['listagem_cor_borda']; ?> !important;
  background-color: <?php echo $config['listagem_cor_botao']; ?> !important; 
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper:hover .btn-buy{
  background-color: <?php echo $config['listagem_cor_hover_botao']; ?> !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper .btn-see{
  color: <?php echo $config['listagem_cor_botao']; ?> !important;
  border-color: <?php echo $config['listagem_cor_botao']; ?> !important;
  background-color:#fff;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper:hover .btn-see{
  color: <?php echo $config['listagem_cor_hover_botao']; ?> !important;
  border-color: <?php echo $config['listagem_cor_hover_botao']; ?> !important;
}
.trimText{
    white-space: nowrap;
    overflow: hidden; 
    text-overflow: ellipsis
}
</style>

<div id="shop--list<?php echo $uniqid; ?>" class="wow <?php echo $lista['efeito']; ?> shop--list__wrapper">

  <div class="shop--list__content">
    <div class="row" style="display: flex; flex-wrap: wrap;">
      <?php foreach ($imoveis as $imovel) {
        $nome_arquivo    = $imovel['url'].'-'.$imovel['id'].".html";
        $url             = ConfigPainel('site_url').$nome_arquivo;

        $segunda_foto = DBRead('imobiliaria_imov_imagens','uniq',"WHERE id_imovel = '{$imovel['id']}' AND id != {$imovel['id_imagem_capa']}");

        if(is_array($segunda_foto)){
          $segunda_foto = $segunda_foto[0]['uniq'];
        }
        else{
          $segunda_foto = false;
        }
      ?>
        <div class="shop--imovel col-md-<?php echo $tamanho_coluna; ?> trimText">
          <div class="shop--imovel__wrapper">
            <div class="shop--imovel__img">
              <a href="<?php echo $url;?>">
                <img class="shop--imovel__primary-img" src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/uploads/<?php echo $imovel['id_foto_capa']; ?>" alt="Foto Imóvel <?php echo $imovel['nome']; ?> 1">

                <?php if($segunda_foto){ ?>
                  <img class="shop--imovel__secondary-img" src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/uploads/<?php echo $segunda_foto; ?>" alt="Foto Imóvel <?php echo $imovel['nome']; ?> 2">
                <?php } ?>
              </a>
              <div class="shop--imovel__action">
                <a class="btn-buy btn btn-primary btn-block" <?php echo (!empty($imovel['link_venda'])) ? "target='{$imovel["target_link"]}' href='{$imovel["link_venda"]}'" : 'onclick="CarrinhoAdd('.$imovel["id"].', '."'{$config["pagina_carrinho"]}'".')"'; ?>>Comprar</a>
              </div>
            </div>
            <div class="shop--imovel__content">
              <div class="shop--imovel__info">
                <h4 class="shop--imovel__name">
                  <a href="<?php echo $url;?>"><?php echo $imovel['nome']; ?></a>
                </h4>
                <div class="shop--imovel__price">
                  <?php if($imovel['a_consultar'] == 'S') {?>
                    A consultar
                  <?php } else { ?>
                    <?php echo $config['moeda'].' '.number_format($imovel['preco'],2,",","."); ?>
                  <?php } ?>
                </div>
                <div>
                  <a class="btn-see" href="<?php echo $url;?>">Ver Imóvel</a>
                </div>
              </div>
              
            </div>
            
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
