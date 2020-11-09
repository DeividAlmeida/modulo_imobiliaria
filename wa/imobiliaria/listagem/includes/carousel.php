<!DOCTYPE html>
<html lang="pt" >
<head>
  <meta charset="UTF-8">


<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>elementia/assets/css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>elementia/css/button.css">
<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>elementia/css/slider.css">
<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>/wa/imobiliaria/assets/css/carousel.css">
<script src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>elementia/assets/js/owl.carousel.min.js"></script>
<style>
  body{
  background-color: #f1f6ff;
}
#news-slider{
    margin-top: 80px;
}
.post-slide{
    background: #fff;
    margin: 20px 15px 20px;
    border-radius: 15px;
    padding-top: 1px;
    box-shadow: 0px 14px 22px -9px #bbcbd8;
}
.post-slide .post-img{
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    margin: -12px 15px 8px 15px;
    margin-left: -10px;
}
.post-slide .post-img img{
    width: 100%;
    height: auto;
    transform: scale(1,1);
    transition:transform 0.2s linear;
}
.post-slide:hover .post-img img{
    transform: scale(1.1,1.1);
}
.post-slide .over-layer{
    width:100%;
    height:100%;
    position: absolute;
    top:0;
    left:0;
    opacity:0;
    background: linear-gradient(-45deg, rgba(6,190,244,0.75) 0%, rgba(45,112,253,0.6) 100%);
    transition:all 0.50s linear;
}
.post-slide:hover .over-layer{
    opacity:1;
    text-decoration:none;
}
.post-slide .over-layer i{
    position: relative;
    top:45%;
    text-align:center;
    display: block;
    color:#fff;
    font-size:25px;
}
.post-slide .post-content{
    background:#fff;
    padding: 2px 20px 40px;
    border-radius: 15px;
}
.post-slide .post-title a{
    font-size:15px;
    font-weight:bold;
    color:#333;
    display: inline-block;
    text-transform:uppercase;
    transition: all 0.3s ease 0s;
}
.post-slide .post-title a:hover{
    text-decoration: none;
    color:#3498db;
}
.post-slide .post-description{
    line-height:24px;
    color:#808080;
    margin-bottom:25px;
}
.post-slide .post-date{
    color:#a9a9a9;
    font-size: 14px;
}
.post-slide .post-date i{
    font-size:20px;
    margin-right:8px;
    color: #CFDACE;
}
.post-slide .read-more{
    padding: 7px 20px;
    float: right;
    font-size: 12px;
    background: #2196F3;
    color: #ffffff;
    box-shadow: 0px 10px 20px -10px #1376c5;
    border-radius: 25px;
    text-transform: uppercase;
}
.post-slide .read-more:hover{
    background: #3498db;
    text-decoration:none;
    color:#fff;
}
.owl-controls .owl-buttons{
    text-align:center;
    margin-top:20px;
}
.owl-controls .owl-buttons .owl-prev{
    background: #fff;
    position: absolute;
    top:-13%;
    left:15px;
    padding: 0 18px 0 15px;
    border-radius: 50px;
    box-shadow: 3px 14px 25px -10px #92b4d0;
    transition: background 0.5s ease 0s;
}
.owl-controls .owl-buttons .owl-next{
    background: #fff;
    position: absolute;
    top:-13%;
    right: 15px;
    padding: 0 15px 0 18px;
    border-radius: 50px;
    box-shadow: -3px 14px 25px -10px #92b4d0;
    transition: background 0.5s ease 0s;
}
.owl-controls .owl-buttons .owl-prev:after,
.owl-controls .owl-buttons .owl-next:after{
    content:"\f104";
    font-family: FontAwesome;
    color: #333;
    font-size:30px;
}
.owl-controls .owl-buttons .owl-next:after{
    content:"\f105";
}
@media only screen and (max-width:1280px) {
    .post-slide .post-content{
        padding: 0px 15px 25px 15px;
    }
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__info p{
color: <?php echo $config['listagem_cor_titulo']; ?> !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__price{
  color: <?php echo $config['listagem_cor_preco']; ?> !important;
}

#shop--list<?php echo $uniqid; ?> .shop--imovel__action a, .shop--imovel__btn a, bottom{
  background-color: <?php echo $config['listagem_cor_botao']; ?> !important;
  border:<?php echo $config['listagem_cor_botao']; ?> !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__action a:hover, .shop--imovel__btn a:hover{
    background-color: <?php echo $config['listagem_cor_hover_botao']; ?> !important;
    color: <?php echo $config['carrocel_cor_setas']; ?> !important;
    -webkit-transition: 0.3s all ease;
    -moz-transition: 0.3s all ease;
    -o-transition: 0.3s all ease;
    -ms-transition: 0.3s all ease;
    transition: 0.3s all ease;
    cursor: pointer
}
.trimText{
    white-space: nowrap;
    overflow: normal; 
    text-overflow: ellipsis
}

#Ashop--list<?php echo $uniqid; ?> .shop--imovel__wrapper {
    background: #ffffff;
    border: 1px solid <?php echo $config['listagem_cor_borda']; ?> !important;
    border-bottom: 3px solid <?php echo $config['listagem_cor_borda']; ?> !important;
    border-radius: 8px;
    overflow: hidden;
    position: relative;

}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__name {
  color:  <?php echo $config['carrocel_cor_hover_btn']; ?> !important;
  font-size: 12px;
  font-weight: 700;
  margin-bottom: 6px;
  width: 50%;
  overflow: hidden;
  text-overflow: ellipsis;
  background-color: <?php echo $config['carrocel_cor_btn']; ?> !important;
  border-radius: 30px !important;
  padding: 6px 10px !important;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__name a {
  white-space: nowrap;
}
#Ashop--list<?php echo $uniqid; ?> .Ashop--imovel__price{
  color: #383838;
  font-size: 18px;
  font-weight: 600;
  width:120px;
  clear: both;
  padding-top: 5px;

}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__street{
  color: #383838;
  font-size: 14px;
  font-weight: 550;
  margin: 0;
  padding: 15px 0  0 ;
  clear: both;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__andress{
  color: <?php echo $config['carrocel_cor_titulo']; ?> !important;
  font-size: 14px;
  margin: 0;
  padding:  0  0 15px;
  clear: both;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__rooms{
  color: <?php echo $config['carrocel_cor_hover_titulo']; ?> !important;
  font-size: 16px;
  margin: 0;
  padding:  10px  0 10px;
  clear: both;
  width: 280px;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__rooms .fa-bed{

  margin: 0 3px 0;

}
#Ashop--list<?php echo $uniqid; ?> .Ashop--imovel__price a {
  white-space: nowrap;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__tag {
  border-radius: 3px;
  color: #fff;
  display: inline-block;
  font-size: 12px;
  font-weight: bold;
  height: 40px;
  left: 20px;
  letter-spacing: 1px;
  line-height: 40px;
  position: absolute;
  text-align: left;
  text-transform: uppercase;
  top: 20px;
  width: auto;
  padding: 0 10px 0;
}
#Ashop--list<?php echo $uniqid; ?> .Ashop--imovel__img img {
    max-width: 100%;
    max-height: 100%;
    overflow:hidden;
    -webkit-transition: 0.3s all ease;
    -moz-transition: 0.3s all ease;
    -o-transition: 0.3s all ease;
    -ms-transition: 0.3s all ease;
    transition: 0.3s all ease;
}
#Ashop--list<?php echo $uniqid; ?> .Ashop--imovel__img {
  
overflow:hidden;
}
#Ashop--list<?php echo $uniqid; ?> .Ashop--imovel__secondary-img{
  left: 0;
  opacity: 0;
  position: absolute;
  right: 0;
  top: 0;
  transition: all 500ms ease-in-out 0s;
 
}

#Ashop--list<?php echo $uniqid; ?> .shop--imovel__content{
  text-align: left;
  padding: 15px;
  position: relative;
  
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__info{
    border-left: 5px <?php echo $config['carrocel_cor_btn_texto']; ?>  solid !important;
    max-width: 350px !important;
    position: relative;
    word-wrap: normal !important;
    text-align: left !important;
    padding-left:20px;
    padding-top: 10px;
    border-radius: 0px !important;
}

#Ashop--list<?php echo $uniqid; ?> .Ashop--imovel__action a, #Ashop--list<?php echo $uniqid; ?> .shop--imovel__btn a{
    color: <?php echo $config['carrocel_cor_descricao']; ?> !important;
    border: none;
    border-radius: 30px;
    font-size: 12px;
    padding: 7px 10px 7px;
    margin: 5px 15px 5px;
    -webkit-transition: 0.3s all ease;
    -moz-transition: 0.3s all ease;
    -o-transition: 0.3s all ease;
    -ms-transition: 0.3s all ease;
    transition: 0.3s all ease;
}
#Ashop--list<?php echo $uniqid; ?> .Ashop--imovel__action{
  align-content: center !important;
}

#Ashop--list<?php echo $uniqid; ?> .Ashop--imovel__price{
  color: <?php echo $config['listagem_cor_preco']; ?> !important;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__wrapper:hover img{
    opacity: 0.8;
  -moz-transform: scale(1.1);
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
    -webkit-transition: 0.3s all ease;
    -moz-transition: 0.3s all ease;
    -o-transition: 0.3s all ease;
    -ms-transition: 0.3s all ease;
    transition: 0.3s all ease;
    opacity: 0.7;
    cursor: pointer;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__wrapper:hover{
    border-bottom: <?php echo $config['carrinho_cor_btns']; ?>  3px solid !important ;

}
#Ashop--list<?php echo $uniqid; ?> .Ashop--imovel__action a, .shop--imovel__btn a{
  background-color: <?php echo $config['listagem_cor_botao']; ?> !important;
}
#Ashop--list<?php echo $uniqid; ?> .Ashop--imovel__action a:hover, .shop--imovel__btn a:hover{
     color: <?php echo $config['carrocel_cor_setas']; ?> !important;
    background-color: <?php echo $config['listagem_cor_hover_botao']; ?> !important;
    -webkit-transition: 0.3s all ease;
    -moz-transition: 0.3s all ease;
    -o-transition: 0.3s all ease;
    -ms-transition: 0.3s all ease;
    transition: 0.3s all ease;
    cursor: pointer
      
}
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div id="news-slider" class="owl-carousel">
      
          <?php foreach ($imoveis as $imovel) {
            $nome_arquivo    = $imovel['url'].'-'.$imovel['id'].".html";
            $url             = ConfigPainel('site_url').$nome_arquivo;
          ?>
            <div class="post-slide">
              <a class="post-img" href="<?php echo $url; ?>">
                <img src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/uploads/<?php echo $imovel['id_foto_capa']; ?>" alt="Foto Im¨®vel <?php echo $imovel['nome']; ?>">
                
              </a>
              <div class="shop--imovel__content">
                <center id="frist_objects">
                    <p class="shop--imovel__name">
                       <?php echo $tipos['nome']; ?>
                    </p>
                <div class="Ashop--imovel__price">
                     <?php if($imovel['a_consultar'] == 'S') {?>
                        A consultar
                      <?php } else { ?>
                        <?php echo $config['moeda'].' '.number_format($imovel['preco'],2,",","."); ?>
                      <?php } ?>
                </div>
                </center> <br>
              <div class="shop--imovel__info">
               
                <div class="Ashop--imovel__resume">
                     <?php echo $imovel['resumo'];  ?>
                </div>
                <div class="shop--imovel__andress">
                     <?php echo $imovel['rua']." - ".$imovel['bairro']." - ".$imovel['cidade'];  ?>
                </div>
              </div>
              <div class="shop--imovel__rooms"> 
                    <i class="fa fa-clone" aria-hidden="true"> 
                        <?php echo intval($imovel['tamanho']);  ?><span>&#13217;</span>
                    </i>
                    <i class="fa fa-bed" aria-hidden="true"> 
                         <?php echo intval($imovel['quartos']);  ?>
                    </i>
                    <i class="fa fa-shower" aria-hidden="true"> 
                        <?php echo intval($imovel['banheiros']);  ?>
                    </i>
                    <i class="fa Ashop--imovel__action" aria-hidden="true"> 
                        <a class="btn btn-primary btn-lg btn-block" href="<?php echo $url;?>">
                            <i class="fa fa-eye" aria-hidden="true"></i> Ver Im¨®vel
                        </a>
                    </i>
                </div>
            </div>
            </div>
        <?php } ?>
        <div class="post-slide">
          <div class="post-img">
            <img src="https://source.unsplash.com/506x306/?business&q=50" alt="">
            <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
          </div>
          <div class="post-content">
            <h3 class="post-title">
              <a href="#">Lorem ipsum dolor sit amet.</a>
            </h3>
            <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
            <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
            <a href="#" class="read-more">read more</a>
          </div>
        </div>
        
        <div class="post-slide">
          <div class="post-img">
            <img src="https://source.unsplash.com/506x306/?business&q=50" alt="">
            <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
          </div>
          <div class="post-content">
            <h3 class="post-title">
              <a href="#">Lorem ipsum dolor sit amet.</a>
            </h3>
            <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
            <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
            <a href="#" class="read-more">read more</a>
          </div>
        </div>
        
        <div class="post-slide">
          <div class="post-img">
            <img src="https://source.unsplash.com/506x306/?business&q=50" alt="">
            <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
          </div>
          <div class="post-content">
            <h3 class="post-title">
              <a href="#">Lorem ipsum dolor sit amet.</a>
            </h3>
            <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
            <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
            <a href="#" class="read-more">read more</a>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
<!-- partial -->


<script>
  $(document).ready(function() {
      
    $("#news-slider").owlCarousel({
        items : 3,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
      stopOnHover:    true,
      nav:            true,
      navText:        ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        pagination:true,
        autoPlay:true
    });
});
</script>

</body>
</html>
