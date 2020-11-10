<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>elementia/assets/css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>elementia/css/button.css">
<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>elementia/css/slider.css">
<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>/wa/imobiliaria/assets/css/carousel.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
    });
  });
</script>


<style>
.owl-nav .owl-prev, .owl-next{
margin:-15px !important;
}
.shop--modal-add-product__btn{
  border: 0 !important;
  margin-top:10px !important;
  background-color: <?php echo $config['listagem_cor_botao']; ?> !important;
}
#CaroulselImobiliaria<?php echo $uniqid; ?> .cpe-button{
  background-color: <?php echo $config['listagem_cor_botao']; ?> !important;
  color: <?php echo $config['carrocel_cor_descricao']; ?> !important;
}
#CaroulselImobiliaria<?php echo $uniqid; ?> .cpe-button:hover{
  background-color: <?php echo $config['listagem_cor_hover_botao']; ?> !important;
}
#CaroulselImobiliaria<?php echo $uniqid; ?> .product-body h6{
  color: <?php echo $config['listagem_cor_titulo']; ?> !important;
}
/*#CaroulselImobiliaria<?php echo $uniqid; ?> .product-body h6:hover{
  color: <?php echo $config['listagem_cor_titulo']; ?> !important;
}*/
#CaroulselImobiliaria<?php echo $uniqid; ?> .product-body p{
  color: <?php echo $config['listagem_cor_titulo']; ?> !important;
}
#CaroulselImobiliaria<?php echo $uniqid; ?> .owl-next, #CaroulselImobiliaria<?php echo $uniqid; ?> .owl-prev{
  background-color: <?php echo $config['listagem_cor_botao']; ?> !important;
}
#CaroulselImobiliaria<?php echo $uniqid; ?> .owl-next:hover, #CaroulselImobiliaria<?php echo $uniqid; ?> .owl-prev:hover{
  background-color: <?php echo $config['listagem_cor_hover_botao']; ?> !important;
}
</style>

<div class="row">
  <div class="span12 shop--list">
    <div id="CaroulselImobiliaria<?php echo $uniqid; ?>" class="cpe-product-calousel owl-carousel owl-theme">
      <?php if(is_array($imoveis)){ foreach ($imoveis as $imovel) {
        $nome_arquivo    = $imovel['url'].'-'.$imovel['id'].".html";
        $url             = ConfigPainel('site_url').$nome_arquivo;
      ?>
        <div class="cpe-product-item">
          <div class="product-thumb">
            <a href="<?php echo $url; ?>">
                <img class="shop--imovel__primary-img" src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/uploads/<?php echo $imovel['id_foto_capa']; ?>" alt="Foto Imóvel <?php echo $imovel['nome']; ?> 1">
            </a>
          </div>
          <div class="product-body">
            <h6><a href="<?php echo $url; ?>"><?php echo $imovel['nome']; ?></a></h6>
            <p><?php echo $imovel['resumo']; ?></p>
            <div class="product-buttons">
              <a href="<?php echo $url; ?>" class="cpe-button cpe-detail-button cpe-button-2x"><i class="fa fa-eye" aria-hidden="true"></i> Ver Imóvel</a>
            </div>
          </div>
        </div>
      <?php } } ?>
    </div>
  </div>
</div>
