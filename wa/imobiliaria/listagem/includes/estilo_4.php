<!-- External Css -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
#frist_objects{
    height: auto;
    -webkit-justify-content: space-between;
    display: flex;
    width:250px;
}
.fa {
    font-family: FontAwesome, Arial !important;
    font-size: 14px !important;
}


.swal2-popup{
  font-size: 14px !important;
}
.shop--modal-add-imovel__btn{
  border: 0 !important;
  margin-top:10px !important;
  background-color: <?php echo $config['carrinho_cor_btns']; ?> !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper {
  background: <?php echo $config['carrocel_cor_hover_setas']; ?> !important;
  border: 1px solid transparent;
  border-radius: 8px;
  overflow: auto;  
  position: relative;
  margin: 15px 0;
  border: 1px solid <?php echo $config['listagem_cor_borda']; ?> !important;
  white-space: normal !important;
<?php echo $config['carrinho_cor_btn_finalizar']; ?>
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
  font-size: 24px;
  font-weight: 600;
  margin: 0;
  padding: 25px 0 0 0 !important;
  clear: both;
  width:auto;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__resume{
    color: <?php echo $config['listagem_cor_titulo']; ?> !important;
    font-size: 14px;
    font-weight: 550;
    margin: 0;
    padding: 7px 0 7px 0;
    width:100%;
    overflow:hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  
}

.Ashop--imovel__resume{
    color: <?php echo $config['listagem_cor_titulo']; ?> !important;
    font-size: 16px;
    font-weight: 550;
    width:100%;
    overflow:hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

#shop--list<?php echo $uniqid; ?> .shop--imovel__andress{
  color: <?php echo $config['carrocel_cor_titulo']; ?> !important;
  font-size: 16px;
  margin: 10px 0 0 0;
  padding:  0  0 3px;
  clear: both;
  position:relative;
  overflow:none;
} 
#shop--list<?php echo $uniqid; ?> .shop--imovel__rooms{
  color: <?php echo $config['carrocel_cor_hover_titulo']; ?> !important;
  font-size: 16px;
  margin: 0;

}
#shop--list<?php echo $uniqid; ?> .shop--imovel__rooms .fa-bed{
  margin: 0 10px 0;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__rooms .fa-car{
  margin-right: 10px;
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
  z-index: 1000;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__img img {
    max-width: auto;
    max-height: 200px;
    margin-right:5px;
    -webkit-transition: 0.3s all ease;
    -moz-transition: 0.3s all ease;
    -o-transition: 0.3s all ease;
    -ms-transition: 0.3s all ease;
    transition: 0.3s all ease;
}

#shop--list<?php echo $uniqid; ?> .shop--imovel__secondary-img{
  left: 0;
  opacity: 0;
  position: absolute;
  right: 0;
  top: 0;
  transition: all 500ms ease-in-out 0s;
}
.shop--imovel__wrapper:hover .shop--imovel__img img{
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
    border-color: <?php echo $config['listagem_cor_borda']; ?> !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__content{
  text-align: left;
  position: relative;
  width: 30% !important;
 /* margin-left:5% !important;
  padding-left:0px !important*/
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__img {
width: 300px !important ;
padding: 0px !important;
padding-right:5px;
overflow:hidden;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__info{
    border-radius: 3px;
    width: 210% !important;
    position: relative;
    word-wrap: normal !important;


}

#shop--list<?php echo $uniqid; ?> .shop--imovel__info ul {
    padding:0px;
    margin:0px;

    display: inline;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__info li {
display: inline;
margin-right: 10px;

}
 #shop--list<?php echo $uniqid; ?> .shop--imovel__action{
    border-radius: 3px;
    width: 10% !important;
    position: absolute;
    word-wrap: normal !important;
    top: 140px;
    right: 150px;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__action a, #shop--list<?php echo $uniqid; ?> .shop--imovel__btn a{
    color: #fff !important;
    border: none;
    border-radius: 30px;
    padding: 6px 10px;
    width:150px !important;
    -webkit-transition: 0.3s all ease;
    -moz-transition: 0.3s all ease;
    -o-transition: 0.3s all ease;
    -ms-transition: 0.3s all ease;
    transition: 0.3s all ease;
}

#shop--list<?php echo $uniqid; ?> .shop--imovel__name {
  color: #fff !important;
  border-radius: 30px !important;
  padding: 6px 10px !important;
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

<?php if($config['listagem_estilo'] == '4'): ?>
@media (min-width: 1200px) {
    
    #Ashop--list<?php echo $uniqid; ?> .shop--imovel__wrapper{
        display:none;
    }
    
}
@media (max-width: 1200px) {
    
    #shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper{
        display:none;
    }
    #Ashop--list<?php echo $uniqid; ?> .shop--imovel__wrapper{
        display:block;
        margin-left: 0 !important;

    }
    
}
<?php else: ?>
 #shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper{
        display:none;
    }
    #Ashop--list<?php echo $uniqid; ?> .shop--imovel__wrapper{
        display:block;
        margin: 15px 0 15px !important;

    }
<?php endif; ?>
</style> 
<?php 
$todos_tipos =  DBRead('imobiliaria_categorias','*');
?>
<div id="shop--list<?php echo $uniqid; ?>" class="wow <?php echo $lista['efeito']; ?> shop--list__wrapper">
  <div class="shop--list__content container">
    <div class="row" style="flex-wrap: wrap;">
      <?php if(is_array($imoveis)){foreach ($imoveis as $imovel) {
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
        <div class="shop--imovel col-lg-12 trimText">
          <div class="shop--imovel__wrapper">
            <div class="shop--imovel__img col-lg-6">
              <a href="<?php echo $url;?>">
                 <!--<span class="shop--imovel__tag" style="background-color:<?php echo $imovel['etiqueta_cor'] ?>"><?php echo $imovel['etiqueta'] ?></span>-->
                <img class="shop--imovel__primary-img" src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/uploads/<?php echo $imovel['id_foto_capa']; ?>" alt="Foto Imóvel <?php echo $imovel['nome']; ?> 1">

                <?php if($segunda_foto){ ?>
                  <!--<img class="shop--imovel__secondary-img" src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/uploads/<?php echo $segunda_foto; ?>" alt="Foto Imóvel <?php echo $imovel['nome']; ?> 2"> -->
                <?php } ?>
              </a>
            </div>
            <div class="shop--imovel__content col-lg-6">
            <div class="shop--imovel__price">
              <?php if($imovel['a_consultar'] == 'S') {?>
                A consultar
              <?php } else { ?>
                <?php echo $config['moeda'].' '.number_format($imovel['preco'],2,",","."); ?>
              <?php } ?>
            </div>                
              <div class="shop--imovel__info">
                    <ul>
                      <?php $plus = json_decode($imovel['taxas'], true); if(is_array($plus)): foreach($plus as $key => $taxas):  ?>
                       <li><?php echo $taxas['descricao'].' '. $config['moeda'].' '.number_format($taxas['taxa'],2,",",".") ?></li>
                       <?php endforeach; endif; ?>
                    </ul>
                <p class="shop--imovel__resume">
                     <?php echo $imovel['resumo'];  ?>
                </p>
                <div class="shop--imovel__andress">
                     <?php echo $imovel['rua']." ".$imovel['cidade'];  ?>
                </div>
                <div class="shop--imovel__rooms"> 
                    <i class="fa fa-clone" aria-hidden="true"> <?php echo intval($imovel['tamanho']);  ?><span>&#13217;</span>
                    </i>
                    <i class="fa fa-bed" aria-hidden="true"> 
                         <?php echo intval($imovel['quartos']);  ?>
                    </i>
                    <i class="fa fa-car" aria-hidden="true"> 
                     <?php echo intval($imovel['garagem']);  ?>
                    </i>
                     <i class="fa fa-shower" aria-hidden="true"> 
                     <?php echo intval($imovel['banheiros']);  ?>
                     </i>
                </div>
              </div>
              
            </div>
            <div class="shop--imovel__action" >
              <center>  <a class="btn btn-primary btn-lg btn-block" href="<?php echo $url;?>"><i class="fa fa-eye" aria-hidden="true"></i> Ver o Imóvel</a></center>
             </div>
          </div>
        </div>
      <?php }; }else{ echo "<center class='col-md-8' >Nenhum imóvel encontrado</center>" ;} ?>
    </div>
  </div>
</div>

<div id="Ashop--list<?php echo $uniqid; ?>" class="wow <?php echo $lista['efeito']; ?> Ashop--list__wrapper">
  <div class="Ashop--list__content container">
    <div class="row justify-content-md-center" style="display: flex; flex-wrap: wrap;">
      <?php if(is_array($imoveis)){ foreach ($imoveis as $imovel) {
        $tipo =  DBRead('imobiliaria_imov_categorias','*',"WHERE id_imovel = '{$imovel['id']}'")[0]; 
        $tipos =  DBRead('imobiliaria_categorias','*',"WHERE id = '{$tipo['id_categoria']}'")[0];
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
      
        <div class="shop--imovel col-md-<?php if(empty($lista['colunas'])){echo '4';}else{echo $lista['colunas'];} ?> trimText">
          <div class="shop--imovel__wrapper">
            <div class="Ashop--imovel__img">
              <a href="<?php echo $url;?>">
                 <!--<span class="shop--imovel__tag" style="background-color:<?php echo $imovel['etiqueta_cor'] ?>"><?php echo $imovel['etiqueta'] ?></span> -->
                <img class="shop--imovel__primary-img" src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/uploads/<?php echo $imovel['id_foto_capa']; ?>" alt="Foto Imóvel <?php echo $imovel['nome']; ?> 1">

                <?php if($segunda_foto){ ?>
                  <!-- <img class="shop--imovel__secondary-img" src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/uploads/<?php echo $segunda_foto; ?>" alt="Foto Imóvel <?php echo $imovel['nome']; ?> 2"> -->
                <?php } ?>
              </a>
            </div>
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
                            <i class="fa fa-eye" aria-hidden="true"></i> Ver Imóvel
                           
                        </a>
                    </i>

                </div>
            </div>
            
          </div>
        </div>
      <?php } } ?>
    </div>
  </div>
</div>

