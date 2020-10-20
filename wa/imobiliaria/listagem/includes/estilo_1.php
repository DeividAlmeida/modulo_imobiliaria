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

#shop--list<?php echo $uniqid; ?> .swal2-popup{
  font-size: 14px !important;
}
#shop--list<?php echo $uniqid; ?> .shop--list--bar{
  width: 100%;
  text-align: right;
}
#shop--list<?php echo $uniqid; ?> .shop--list--bar__btn{
  font-size: 1.5em;
  color: #000;
  opacity: 0.5;
  margin: 0 5px;
}
#shop--list<?php echo $uniqid; ?> .shop--list--bar__btn:hover{
  opacity: 1;
}
#shop--list<?php echo $uniqid; ?> .shop--list--bar__btn.is-active{
  opacity:1;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper {
  background: #ffffff;
  border: 1px solid #e5e5e5;
  border-radius: 8px;
  overflow: hidden;
  position: relative;
  margin: 15px 0;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__name {
  color: #383838;
  font-size: 16px;
  margin: 6px 0;
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
  font-size: 18px;
  font-weight: 600;
  margin: 0;
  padding: 0 0 15px;
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
#shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper:hover .shop--imovel__action, #shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper:hover .shop--imovel__secondary-img {
  opacity: 1;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper:hover .shop--imovel__img{
  opacity: 0.8;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__action{
  bottom: 80px;
  display: inline-block;
  left: 0;
  opacity: 0;
  padding: 0 20px;
  position: absolute;
  right: 0;
  text-align: center;
  transition: all 0.3s ease 0s;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__action a, #shop--list<?php echo $uniqid; ?> .shop--imovel__btn a{
  color: #fff !important;
  border: none;
  border-radius: 50%;
  padding: 5px 7px;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__content{
  text-align: center;
  padding: 0 15px;
}


#shop--list<?php echo $uniqid; ?> .shop--list__content.is-grid .shop--imovel__resume, #shop--list<?php echo $uniqid; ?> .shop--list__content.is-grid .shop--imovel__btn, #shop--list<?php echo $uniqid; ?> .shop--list__content.is-list .shop--imovel__action{
  display:none;
}

#shop--list<?php echo $uniqid; ?> .shop--list__content.is-list .shop--imovel__resume{
  display: block;
  color: #818181;
  font-size: 16px;
  line-height: 30px;
  margin: 0;
}
#shop--list<?php echo $uniqid; ?> .shop--list__content.is-list .shop--imovel__wrapper{
  display: flex;
  margin: 7.5px 0;
}
#shop--list<?php echo $uniqid; ?> .shop--list__content.is-list .shop--imovel__img{
  flex: 0 0 200px;
  max-width: 200px;
}
#shop--list<?php echo $uniqid; ?> .shop--list__content.is-list .shop--imovel__content{
  margin-left: 20px;
  text-align: left;
}

#shop--list<?php echo $uniqid; ?> .shop--imovel__name a{
  color: <?php echo $config['listagem_cor_titulo']; ?> !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__price{
  color: <?php echo $config['listagem_cor_preco']; ?> !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper{
  border-color: <?php echo $config['listagem_cor_borda']; ?> !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__action a, .shop--imovel__btn a{
  background-color: <?php echo $config['listagem_cor_botao']; ?> !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__action a:hover, .shop--imovel__btn a:hover{
  background-color: <?php echo $config['listagem_cor_hover_botao']; ?> !important;
}
#shop--list<?php echo $uniqid; ?> .shop--list--bar__btn{
  color: <?php echo $config['listagem_cor_filtro']; ?> !important;
}
.trimText{
    white-space: nowrap;
    overflow: hidden; 
    text-overflow: ellipsis
}
</style>

<div id="shop--list<?php echo $uniqid; ?>" class="wow <?php echo $lista['efeito']; ?> shop--list__wrapper">

  <?php if($lista['mostrar_filtro'] == 'S'){  ?>
    <div class="shop--list--bar">
      <a class="shop--list--bar__btn shop--list--bar__view-grid is-active"><span class="fa fa-th-large"></span></a>
      <a class="shop--list--bar__btn shop--list--bar__view-list"><span class="fa fa-th-list"></span></a>
    </div>
  <?php } ?>
  <div class="shop--list__content is-grid">
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
                <a class="btn btn-primary btn-lg" <?php echo (!empty($imovel['link_venda'])) ? "target='{$imovel["target_link"]}' href='{$imovel["link_venda"]}'" : 'onclick="CarrinhoAdd('.$imovel["id"].', '."'{$config["pagina_carrinho"]}'".')"'; ?>><span class="fa fa-cart-plus"></span></a>
                <a class="btn btn-primary btn-lg" href="<?php echo $url;?>"><span class="fa fa-eye"></span></a>
              </div>
            </div>
            <div class="shop--imovel__content" style="display: inline-grid;">
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
              <div class="shop--imovel__resume">
                <?php echo $imovel['resumo']; ?>
              </div>
              <div class="shop--imovel__btn">
                <a class="btn btn-primary" <?php echo (!empty($imovel['link_venda'])) ? "target='{$imovel["target_link"]}' href='{$imovel["link_venda"]}'" : 'onclick="CarrinhoAdd('.$imovel["id"].', '."'{$config["pagina_carrinho"]}'".')"'; ?>><span class="fa fa-cart-plus"></span></a>
                <a class="btn btn-primary" href="<?php echo $url;?>"><span class="fa fa-eye"></span></a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
