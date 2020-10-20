<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>elementia/assets/css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>elementia/css/button.css">
<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>elementia/css/slider.css">
<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>/wa/imobiliaria/assets/css/carousel.css">

<script src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>elementia/assets/js/owl.carousel.min.js"></script>

<script>
  $(document).ready( function() {
    $("#CaroulselImobiliaria<?php echo $uniqid; ?>").owlCarousel({
      slideSpeed:     200,
      autoPlay:       3000,
      stopOnHover:    true,
      nav:            true,
      navText:        ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
      pagination:     false,
      lazyLoad :      true,
      responsive : {
        0 : {
          items:    1
        },
        994:{
          items: <?php echo $lista['colunas']; ?>
        }
      }
    });
  });
</script>


<style>
.shop--modal-add-imovel__btn{
  border: 0 !important;
  margin-top:10px !important;
  background-color: <?php echo $config['carrinho_cor_btns']; ?> !important;
}
#CaroulselImobiliaria<?php echo $uniqid; ?> .cpe-button{
  background-color: <?php echo $config['carrocel_cor_btn']; ?> !important;
  color: <?php echo $config['carrocel_cor_btn_texto']; ?> !important;
}
#CaroulselImobiliaria<?php echo $uniqid; ?> .cpe-button:hover{
  background-color: <?php echo $config['carrocel_cor_hover_btn']; ?> !important;
}
#CaroulselImobiliaria<?php echo $uniqid; ?> .imovel-body h6{
  color: <?php echo $config['carrocel_cor_titulo']; ?> !important;
}
#CaroulselImobiliaria<?php echo $uniqid; ?> .imovel-body h6:hover{
  color: <?php echo $config['carrocel_cor_hover_titulo']; ?> !important;
}
#CaroulselImobiliaria<?php echo $uniqid; ?> .imovel-body p{
  color: <?php echo $config['carrocel_cor_descricao']; ?> !important;
}
#CaroulselImobiliaria<?php echo $uniqid; ?> .owl-next, #CaroulselImobiliaria<?php echo $uniqid; ?> .owl-prev{
  background-color: <?php echo $config['carrocel_cor_setas']; ?> !important;
}
#CaroulselImobiliaria<?php echo $uniqid; ?> .owl-next:hover, #CaroulselImobiliaria<?php echo $uniqid; ?> .owl-prev:hover{
  background-color: <?php echo $config['carrocel_cor_hover_setas']; ?> !important;
}
</style>

<div class="row">
  <div class="span12 shop--list">
    <div id="CaroulselImobiliaria<?php echo $uniqid; ?>" class="cpe-imovel-calousel owl-carousel owl-theme">
      <?php foreach ($imoveis as $imovel) {
        $nome_arquivo    = $imovel['url'].'-'.$imovel['id'].".html";
        $url             = ConfigPainel('site_url').$nome_arquivo;
      ?>
        <div class="cpe-imovel-item">
          <div class="imovel-thumb">
            <a href="<?php echo $url; ?>">
              <img src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/uploads/<?php echo $imovel['id_foto_capa']; ?>" alt="Foto Imóvel <?php echo $imovel['nome']; ?>">
            </a>
          </div>
          <div class="imovel-body">
            <h6><a href="<?php echo $url; ?>"><?php echo $imovel['nome']; ?></a></h6>
            <p><?php echo $imovel['resumo']; ?></p>
            <div class="imovel-buttons">
              <a href="<?php echo $url; ?>" class="cpe-button cpe-detail-button cpe-button-2x"><?php echo $imovel['btn_texto']; ?></a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
