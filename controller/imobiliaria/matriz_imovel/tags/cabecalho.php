<?php
ob_start();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
<style>
#icones_column{
    width:90px;
}
.pix{
    padding:0 !important;
}
.fa {
    font-family: FontAwesome, Arial !important;
    color:<?php echo $config['email_cor_header_texto']; ?> !important;
        font-weight: 500 !important;
}
.fas {
    color:<?php echo $config['email_cor_header_texto']; ?> !important;
}
  .garagem{
        opacity:<?php echo str_replace('checked','1',$imovel['garagem']) ?> !important;
        opacity:0.2;
    }
    .mobiliado{
        opacity:<?php echo str_replace('checked','1',$imovel['mobiliado']) ?> !important;
        opacity:0.2;
    }
    .pet{
        opacity:<?php echo str_replace('checked','1',$imovel['pet']) ?> !important;
        opacity:0.2;
    } 
    .sol{
        opacity:<?php echo str_replace('checked','1',$imovel['sol']) ?> !important;
        opacity:0.2;
    } 
    .livre{
        opacity:<?php echo str_replace('checked','1',$imovel['livre']) ?> !important;
        opacity:0.2;
    } 
    .metro{
        opacity:<?php echo str_replace('checked','1',$imovel['metro']) ?> !important;
        opacity:0.2;
    }
  .shop--modal-add-imovel__btn{
    border: 0 !important;
    margin-top:10px !important;
    background-color: <?php echo $config['carrinho_cor_btns']; ?> !important;
  }
  .shop--imovel-page--header__name{
    color: <?php echo $config['imovel_cor_titulo']; ?> !important;
    
  }
.shop--imovel-page--header__endereco{
    color: <?php echo $config['imovel_cor_texto_descricao']; ?> !important;
    font-size: 20px;
  }
  .shop--imovel-page--header__price{
    background-color: <?php echo $config['btn_carrinho_cor_btn_meu_carrinho']; ?> !important;
    border-radius:3px;
    border: 1px solid transparent !important;
    <?php echo $config['imovel_cor_tag_categoria']; ?>
    height: auto;
    font-size: 14px !important;
    font-weight: 500;
    padding: 20px;
    line-height: 25px;
  }
  .shop--imovel-page--header__fees{
     height: auto;
    -webkit-justify-content: space-between;
    display: flex;
    font-size:14px;
  }
    .shop--imovel-page--header__price p {
        color:#bababa;
    }
   .shop--imovel__rooms_icones i{
    margin-top: 35px;
    width: 145px;
    }
    .shop--imovel__rooms_icones{
    height: auto;
    -webkit-justify-content: space-between;
    display: flex;
    }
  .shop--imovel-page--header__button{
    background-color: <?php echo $config['imovel_cor_botao']; ?> !important;
    color: <?php echo $config['imovel_cor_texto_botao']; ?> !important;
    font-size: 14px !important;
    padding: 5px !important;
    display: block !important;
    width: 45%;
    border:solid <?php echo $config['imovel_cor_botao']; ?> !important;
  }
  .shop--imovel-page--header__button:hover{
    background-color: <?php echo $config['imovel_cor_hover_botao']; ?> !important;
    color: <?php echo $config['btn_carrinho_cor_texto']; ?> !important;
    border:solid <?php echo $config['imovel_cor_hover_botao']; ?> !important;
  }
    .shop--imovel-page--header__button_2{
    background-color: <?php echo $config['btn_carrinho_cor_btn_ver_carrinho']; ?> !important;
    color: <?php echo $config['btn_carrinho_cor_hover_btn_ver_carrinho']; ?> !important;
    font-size: 14px !important;
    padding: 5px !important;
    display: block !important;
    width: 45%;
    border:solid <?php echo $config['btn_carrinho_cor_btn_ver_carrinho']; ?> !important;
  }
  .shop--imovel-page--header__button_2:hover{
    background-color: <?php echo $config['btn_carrinho_cor_texto_btn_ver_carrinho']; ?> !important;
    color: <?php echo $config['imovel_cor_texto_tag_categoria']; ?> !important;
    border:solid <?php echo $config['btn_carrinho_cor_texto_btn_ver_carrinho']; ?> !important;
  }
  .shop--imovel-page--header__categories li{
    background-color: <?php echo $config['imovel_cor_tag_categoria']; ?> !important;
    color: <?php echo $config['imovel_cor_texto_tag_categoria']; ?> !important;
  }
  .shop--imovel-page--header--main-photo__tag{
    background-color: <?php echo $imovel['etiqueta_cor']; ?> !important;
  }
  .shop--imovel-page--header__resume{
  color: <?php echo $config['imovel_cor_texto_descricao']; ?>;
}
  @media print {
    .hidden-print {
      display: none !important;
    }
  }
  @media (max-width: 1200px){
    .pix{
        margin: 30px;
    }

    .ted{
       margin: 15px; 
    }
}
</style>
<script>

    fetch('<?php echo ConfigPainel('base_url')."wa/imobiliaria/imoveis/api.json";?>').then((response)=>{
        response.json().then(data =>{
            document.getElementById('sol').innerHTML= data.Sol;
            document.getElementById('metro').innerHTML= data.metro;
        });
    });
  new  CountProductView(<?php echo $imovel['id'];?>)
</script>


<div class="shop--imovel-page--header row">
  <div class="col-lg-8 ted">
    <div class="shop--imovel-page--header--main-photo__wrapper">
            <h4 class="shop--imovel-page--header__name" ><?php echo $imovel['nome']; ?></h4>
            <h5 class="shop--imovel-page--header__endereco"><?php echo $imovel['rua'].', '.$imovel['bairro'].', '.$imovel['cidade'].', '.$imovel['numero'].' '.$imovel['complemento']; ?></h5>

      <?php if(isset($imovel['etiqueta']) && !empty($imovel['etiqueta'])){ ?>
        <span class="shop--imovel-page--header--main-photo__tag"><?php echo $imovel['etiqueta']; ?></span>
      <?php } ?>
        <img class="shop--imovel-page--header--main-photo__photo" src="<?php echo $url_img_capa; ?>" alt="Foto do imovel <?php echo $imovel['nome']; ?>" data-zoom-image="<?php echo $url_img_capa; ?>" width="100%"/>

    </div>


    <div id="gallery" class="shop--imovel-page--header--gallery">
      <?php foreach($fotos as $foto){
        $url_img = RemoveHttpS(ConfigPainel('base_url'))."wa/imobiliaria/uploads/".$foto['uniq'];
      ?>
        <a class="shop--imovel-page--header--gallery__img" data-src="<?php echo $url_img; ?>" data-image="<?php echo $url_img; ?>" data-zoom-image="<?php echo $url_img; ?>">
          <img src="<?php echo $url_img; ?>" alt="Foto do imóvel <?php echo $imovel['nome']; ?>">
        </a>
      <?php } ?>
    </div>
  </div>
  <div class="col-lg-4 pix">
    <div class="shop--imovel-page--header__price">
        <div class="shop--imovel-page--header__fees">
            <div class="descricao">
                <b style="color:<?php echo $config['imovel_cor_preco']; ?>">
                    Valor
                </b>
                <?php $pl = json_decode($imovel['taxas'], true); if(is_array($pl)): foreach($pl as $k => $decr):  ?>
                    <p style="color:<?php echo $config['btn_carrinho_cor_fundo']; ?>"><?php echo $decr['descricao'];?></p>
               <?php endforeach; endif; ?>
               <b style="width: 90%; position: absolute; border-top: 1px <?php echo $config['btn_carrinho_cor_fundo']; ?> dashed; color: <?php echo $config['imovel_cor_preco']; ?>;">Total</b>
            </div>
            <div class="fee">
                <b style="color:<?php echo $config['imovel_cor_preco']; ?>">
                  <?php if($imovel['a_consultar'] == 'S') {?>
                    A consultar
                  <?php } else { ?>
                    <?php echo $config['moeda']." ". number_format($imovel['preco'],2,",","."); ?>
                  <?php } ?>
                </b>
                <?php $plu = json_decode($imovel['taxas'], true);  foreach($plu as $ky => $taxa):  ?>
               <p style="color:<?php echo $config['btn_carrinho_cor_fundo']; ?>"><?php if(!empty($taxa['taxa'])): echo $config['moeda'].' '.number_format($taxa['taxa'],2,",","."); $taxatota += $taxa['taxa']; endif; ?></p>
                <?php  endforeach; ?>
               <b style="color: <?php echo $config['imovel_cor_preco']; ?> "><?php if($imovel['a_consultar'] == 'S') {echo "A consultar"; }else{ echo $config['moeda'].' '.number_format($taxatota + $imovel['preco'],2,",",".");} ?></b>

            </div>
        </div>
        
        <center>
            <a class="shop--imovel-page--header__button btn btn-lg" <?php echo (!empty($imovel['link_venda'])) ? "href='{$imovel["link_venda"]}' target='{$imovel["target_link"]}'" : 'onclick="CarrinhoAdd('.$imovel["id"].', '."'{$config["pagina_carrinho"]}'".')"'; ?>>
               Falar com corretor <?php #echo $imovel['btn_texto']; ?>
            </a>
            <a class="shop--imovel-page--header__button_2 btn btn-lg" <?php echo (!empty($imovel['link_mapa'])) ? "href='{$imovel["link_mapa"]}' target='{$imovel["target_link"]}'" : 'onclick="CarrinhoAdd('.$imovel["id"].', '."'{$config["pagina_carrinho"]}'".')"'; ?>>
               Ver no mapa <?php #echo $imovel['btn_texto']; ?>
            </a>
        </center>
      </div>
        <div class="shop--imovel__rooms_icones">
            <div id="icones_column"> 
                <i class="fa fa-clone" aria-hidden="true"> 
                    <?php echo intval($imovel['tamanho']);  ?><span>&#13217;</span>
                </i>
                <i class="fa fa-building" aria-hidden="true"> 
                    <?php echo intval($imovel['andar']);  ?><span>&#9702;</span> Andar 
                </i>
                <i class="fa fa-sun-o sol" aria-hidden="true" algo="Sol da manh�0�0"> 
                     <span id="sol"></span>
                </i>
                <i class="fa fa-car garagem" aria-hidden="true"> 
                     Garagem
                </i> 
            </div>
            <div id="icones_column"> 
                <i class="fa fa-bed" aria-hidden="true"> 
                    <?php echo intval($imovel['quartos']);  ?> Quarto(s)
                </i>
                <i class="fa fa-paw pet" aria-hidden="true"> 
                     Aceita pet 
                </i>
                <i class="fa fa-picture-o livre" aria-hidden="true"> 
                     Vista livre 
                </i>
            </div>
            <div id="icones_column">
                 
            
                <i class="fas fa-shower">  
                    <span class="fa"><?php echo intval($imovel['banheiros']);  ?> 
                        Banheiro(s)
                    </span>
                </i>
                <i class="fas fa-couch mobiliado">
                    <span class="fa">
                        Mobiliado
                    </span>
                </i>    
                <i class="fa fa-train metro" aria-hidden="true"> 
                    <span id="metro"></span>
                </i>
            </div>
            
                           
            
            
        </div>
    </div>
    <hr class="shop--imovel-page--header__divider"/>

    <div class="shop--imovel-page--header__categories " style="display:none">
      <ul>
        <?php foreach($categorias as $categoria){ ?>
          <li><?php echo $categoria['nome']; ?></li>
        <?php } ?>
      </ul>
    </div>

    <p class="shop--imovel-page--header__resume "style="display:none"><?php echo $imovel['resumo']; ?></p>

    <div class="shop--imovel-page__header--share__wrapper hidden-print" >
      <!-- Sharingbutton Facebook -->
      <a class="shop--imovel-page__header--share__link" href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode($url); ?>" target="_blank" rel="noopener" aria-label="Facebook" onClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;">
        <div class="shop--imovel-page__header--share shop--imovel-page__header--share--facebook shop--imovel-page__header--share--medium"><div aria-hidden="true" class="shop--imovel-page__header--share__icon shop--imovel-page__header--share__icon--solid">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/></svg></div>Facebook</div>
      </a>

      <!-- Sharingbutton Twitter -->
      <a class="shop--imovel-page__header--share__link" href="https://twitter.com/intent/tweet/?text=<?php echo urlencode($imovel['nome']); ?>&amp;url=<?php echo urlencode($url); ?>" target="_blank" rel="noopener" aria-label="Twitter" onClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;">
        <div class="shop--imovel-page__header--share shop--imovel-page__header--share--twitter shop--imovel-page__header--share--medium"><div aria-hidden="true" class="shop--imovel-page__header--share__icon shop--imovel-page__header--share__icon--solid">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"><path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z"/></svg></div>Twitter</div>
      </a>

      <!-- Sharingbutton Pinterest -->
      <a class="shop--imovel-page__header--share__link" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode($url); ?>&amp;media=<?php echo urlencode($url); ?>&amp;description=<?php echo urlencode($imovel['nome']); ?>" target="_blank" rel="noopener" aria-label="Pinterest" onClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;">
        <div class="shop--imovel-page__header--share shop--imovel-page__header--share--pinterest shop--imovel-page__header--share--medium"><div aria-hidden="true" class="shop--imovel-page__header--share__icon shop--imovel-page__header--share__icon--solid">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"><path d="M12.14.5C5.86.5 2.7 5 2.7 8.75c0 2.27.86 4.3 2.7 5.05.3.12.57 0 .66-.33l.27-1.06c.1-.32.06-.44-.2-.73-.52-.62-.86-1.44-.86-2.6 0-3.33 2.5-6.32 6.5-6.32 3.55 0 5.5 2.17 5.5 5.07 0 3.8-1.7 7.02-4.2 7.02-1.37 0-2.4-1.14-2.07-2.54.4-1.68 1.16-3.48 1.16-4.7 0-1.07-.58-1.98-1.78-1.98-1.4 0-2.55 1.47-2.55 3.42 0 1.25.43 2.1.43 2.1l-1.7 7.2c-.5 2.13-.08 4.75-.04 5 .02.17.22.2.3.1.14-.18 1.82-2.26 2.4-4.33.16-.58.93-3.63.93-3.63.45.88 1.8 1.65 3.22 1.65 4.25 0 7.13-3.87 7.13-9.05C20.5 4.15 17.18.5 12.14.5z"/></svg></div>Pinterest</div>
      </a>

      <!-- Sharingbutton WhatsApp -->
      <a class="shop--imovel-page__header--share__link" href="whatsapp://send?text=<?php echo urlencode($imovel['nome']); ?>%20<?php echo urlencode($url); ?>" target="_blank" rel="noopener" aria-label="WhatsApp">
        <div class="shop--imovel-page__header--share shop--imovel-page__header--share--whatsapp shop--imovel-page__header--share--medium"><div aria-hidden="true" class="shop--imovel-page__header--share__icon shop--imovel-page__header--share__icon--solid" onClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"><path d="M20.1 3.9C17.9 1.7 15 .5 12 .5 5.8.5.7 5.6.7 11.9c0 2 .5 3.9 1.5 5.6L.6 23.4l6-1.6c1.6.9 3.5 1.3 5.4 1.3 6.3 0 11.4-5.1 11.4-11.4-.1-2.8-1.2-5.7-3.3-7.8zM12 21.4c-1.7 0-3.3-.5-4.8-1.3l-.4-.2-3.5 1 1-3.4L4 17c-1-1.5-1.4-3.2-1.4-5.1 0-5.2 4.2-9.4 9.4-9.4 2.5 0 4.9 1 6.7 2.8 1.8 1.8 2.8 4.2 2.8 6.7-.1 5.2-4.3 9.4-9.5 9.4zm5.1-7.1c-.3-.1-1.7-.9-1.9-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.1-.2.2-.3.2-.6.1s-1.2-.5-2.3-1.4c-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6s.3-.3.4-.5c.2-.1.3-.3.4-.5.1-.2 0-.4 0-.5C10 9 9.3 7.6 9 7c-.1-.4-.4-.3-.5-.3h-.6s-.4.1-.7.3c-.3.3-1 1-1 2.4s1 2.8 1.1 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.3-.3-.4-.6-.5z"/></svg></div>WhatsApp</div>
      </a>      
</div>
<?php
$cabecalho  = ob_get_clean();
$matriz     = str_replace('[WAC_IMOBILIARIA_IMOV_CABECALHO]', $cabecalho, $matriz);
