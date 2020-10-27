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
  border: 1px solid transparent;
  border-radius: 8px;
  overflow: hidden;
  position: relative;
  margin: 15px 0;
  border-color: #c3c3c3 !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__name {
  color: #383838;
  font-size: 12px;
  font-weight: 700;
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
#shop--list<?php echo $uniqid; ?> .shop--imovel__price{
  color: #383838;
  font-size: 16px;
  font-weight: 600;
  margin: 0;
  padding: 0 0 15px;
  clear: both;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__street{
  color: #383838;
  font-size: 14px;
  font-weight: 550;
  margin: 0;
  padding: 15px 0  0 ;
  clear: both;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__andress{
  color: #bababa;
  font-size: 16px;
  margin: 0;
  padding:  0  0 15px;
  clear: both;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__rooms{
  color: #000;
  font-size: 16px;
  margin: 0;
  padding:  0  0 15px;
  clear: both;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__rooms .fa-bed{

  margin: 0 10px 0;

}
#shop--list<?php echo $uniqid; ?> .shop--imovel__price a {
  white-space: nowrap;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__tag {
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
  text-align: left;
  padding: 30px 15px;
  position: relative;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__info, #shop--list<?php echo $uniqid; ?> .shop--imovel__action{
    border-radius: 3px;
    width: 150px !important;
    position: relative;
    word-wrap: normal !important;
    text-align: left !important;

}
#shop--list<?php echo $uniqid; ?> .shop--imovel__action a, #shop--list<?php echo $uniqid; ?> .shop--imovel__btn a{
  color: #fff !important;
  border: none;
  border-radius: 30px;
  padding: 6px 10px;
  width:150px !important;
  
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__action{
  align-content: center !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__name {
  color: #fff !important;
  border-radius: 30px !important;
  padding: 6px 10px !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__info p{
  background-color: <?php echo $config['listagem_cor_titulo']; ?> !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__price{
  color: <?php echo $config['listagem_cor_preco']; ?> !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper:hover{
  border-color: <?php echo $config['listagem_cor_borda']; ?> !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__action a, .shop--imovel__btn a{
  background-color: <?php echo $config['listagem_cor_botao']; ?> !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__action a:hover, .shop--imovel__btn a:hover{
  background-color: <?php echo $config['listagem_cor_hover_botao']; ?> !important;
}
.trimText{
    white-space: nowrap;
    overflow: hidden; 
    text-overflow: ellipsis
}
</style>
<?php $tipo =  DBRead('imobiliaria_imov_categorias','*',"WHERE id_imovel = '{$id}'")[0]; 
$tipos =  DBRead('imobiliaria_categorias','*',"WHERE id = '{$tipo['id_categoria']}'")[0];
?>
<div id="shop--list<?php echo $uniqid; ?>" class="wow <?php echo $lista['efeito']; ?> shop--list__wrapper">

  <div class="shop--list__content">
    <div class="row" style="display: flex; flex-wrap: wrap;">
      <?php if(is_array($imoveis)){ foreach ($imoveis as $imovel) {
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
                 <span class="shop--imovel__tag" style="background-color:<?php echo $imovel['etiqueta_cor'] ?>"><?php echo $imovel['etiqueta'] ?></span> 
                <img class="shop--imovel__primary-img" src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/uploads/<?php echo $imovel['id_foto_capa']; ?>" alt="Foto Imóvel <?php echo $imovel['nome']; ?> 1">

                <?php if($segunda_foto){ ?>
                  <img class="shop--imovel__secondary-img" src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/uploads/<?php echo $segunda_foto; ?>" alt="Foto Imóvel <?php echo $imovel['nome']; ?> 2">
                <?php } ?>
              </a>
            </div>
            <div class="shop--imovel__content">
              <div class="shop--imovel__info">
                <center><p class="shop--imovel__name">
                   <?php echo $tipos['nome']; ?>
                   
                </p></center><br>
                <div class="shop--imovel__street">
                     <?php echo $imovel['rua'];  ?>
                </div>
                <div class="shop--imovel__andress">
                     <?php echo $imovel['bairro'].", ".$imovel['cidade'];  ?>
                </div>
                <div class="shop--imovel__rooms"> 
                    <i class="fa fa-clone" aria-hidden="true"> <?php echo intval($imovel['tamanho']);  ?><span>&#13217;</span>
                    </i>
                    <i class="fa fa-bed" aria-hidden="true"> 
                         <?php echo intval($imovel['quartos']);  ?>
                    </i>
                    <svg id="Layer_1" enable-background="new 0 0 512.027 512.027" height="12" viewBox="0 0 512.027 512.027" width="12" xmlns="http://www.w3.org/2000/svg"><g><path d="m16 296.013h368c8.837 0 16 7.163 16 16v40c0 8.837-7.163 16-16 16h-368c-8.837 0-16-7.163-16-16v-40c0-8.836 7.163-16 16-16z"/><path d="m512 16.022c0 72.114.155 66.992-.28 66.992-1.4 7.4-7.9 13-15.72 13h-200c-20.86 0-38.64 13.38-45.25 32h4.51c66.683 0 120.74 54.057 120.74 120.74v10.26c0 2.761-2.239 5-5 5h-342c-2.761 0-5-2.239-5-5v-10.26c0-66.683 54.057-120.74 120.74-120.74h8.15c7.99-71.9 69.12-128 143.11-128h199.996c8.839 0 16.004 7.169 16.004 16.008z"/><path d="m200 384.013c-8.836 0-16 7.164-16 16v23c0 8.836 7.164 16 16 16s16-7.164 16-16v-23c0-8.836-7.164-16-16-16z"/><path d="m296 384.013c-8.836 0-16 7.164-16 16v23c0 8.836 7.164 16 16 16s16-7.164 16-16v-23c0-8.836-7.164-16-16-16z"/><path d="m248 457.013c-8.836 0-16 7.164-16 16v23c0 8.836 7.164 16 16 16s16-7.164 16-16v-23c0-8.836-7.164-16-16-16z"/><path d="m352 457.013c-8.836 0-16 7.164-16 16v23c0 8.836 7.164 16 16 16s16-7.164 16-16v-23c0-8.836-7.164-16-16-16z"/><path d="m104 384.013c-8.836 0-16 7.164-16 16v23c0 8.836 7.164 16 16 16s16-7.164 16-16v-23c0-8.836-7.164-16-16-16z"/><path d="m152 457.013c-8.836 0-16 7.164-16 16v23c0 8.836 7.164 16 16 16s16-7.164 16-16v-23c0-8.836-7.164-16-16-16z"/><path d="m56 457.013c-8.836 0-16 7.164-16 16v23c0 8.836 7.164 16 16 16s16-7.164 16-16v-23c0-8.836-7.164-16-16-16z"/></g>
                    </svg> <i class="fa" aria-hidden="true"> <?php echo intval($imovel['quartos']);  ?></i>
                </div>
                <div class="shop--imovel__price">
                  <?php if($imovel['a_consultar'] == 'S') {?>
                    A consultar
                  <?php } else { ?>
                    <?php echo $config['moeda'].' '.number_format($imovel['preco'],2,",","."); ?>
                  <?php } ?>
                </div>
              </div>
              <center><div class="shop--imovel__action">
                <a class="btn btn-primary btn-lg btn-block" href="<?php echo $url;?>"><i class="fa fa-eye" aria-hidden="true"></i> Ver o Imóvel</a>
              </div></center>
            </div>
            
          </div>
        </div>
      <?php } } ?>
    </div>
  </div>
</div>
