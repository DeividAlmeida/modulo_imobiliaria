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
  border: 5px solid transparent;
  border-radius: 8px;
  overflow: hidden;
  position: relative;
  margin: 15px 0;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__name {
  color: #383838;
  font-size: 16px;
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
  text-align: left;
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
  text-align: left;
  padding: 30px 15px;
  position: relative;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__info, #shop--list<?php echo $uniqid; ?> .shop--imovel__action{
    border-radius: 3px;
    width: 30% !important;
    position: relative;
    word-wrap: normal !important;
    text-align: center !important;

}
#shop--list<?php echo $uniqid; ?> .shop--imovel__action a, #shop--list<?php echo $uniqid; ?> .shop--imovel__btn a{
  color: #fff !important;
  border: none;
  border-radius: 30px;
  padding: 6px 10px;
  width:100% !important;
  
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__name {
  color: #fff !important;
  border-radius: 30px !important;
    padding: 6px 10px !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__info h3{
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
                <img class="shop--imovel__primary-img" src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/uploads/<?php echo $imovel['id_foto_capa']; ?>" alt="Foto Im贸vel <?php echo $imovel['nome']; ?> 1">

                <?php if($segunda_foto){ ?>
                  <img class="shop--imovel__secondary-img" src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/uploads/<?php echo $segunda_foto; ?>" alt="Foto Im贸vel <?php echo $imovel['nome']; ?> 2">
                <?php } ?>
              </a>
            </div>
            <div class="shop--imovel__content">
              <div class="shop--imovel__info">
                <h3 class="shop--imovel__name">
                   <?php echo $tipos['nome']; ?>
                   
                </h3>
                <div class="shop--imovel__price">
                  <?php if($imovel['a_consultar'] == 'S') {?>
                    A consultar
                  <?php } else { ?>
                    <?php echo $config['moeda'].' '.number_format($imovel['preco'],2,",","."); ?>
                  <?php } ?>
                </div>
              </div>
              <center><div class="shop--imovel__action">
                <a class="btn btn-primary btn-lg btn-block" href="<?php echo $url;?>">Ver o Im贸vel</a>
              </div></center>
            </div>
            
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
