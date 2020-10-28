<!-- External Css -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


<style>

#opcoes{
    position: absolute;
    z-index: 1000;
    background: #fff;
    max-height: 100px !important;
    width: 80%;
    overflow-y: scroll;
    left: 11%;
}
#opcoes div {

    font-weight: bolder;
}

#opcoes div:hover {
    background:#bababa;
    font-weight: bolder;
    cursor:pointer;
}

#find {
   margin-bottom:10px; 
}
.find {
    width:75% !important; 
    padding: 15px 0% 15px 0% !important;
}
.selectBox { 
	position: relative; 
} 

.overSelect { 
	position: absolute; 
	left: 0; 
	right: 0; 
	top: 0; 
	bottom: 0; 
} 

#checkBoxes { 
	display: none; 
    position: absolute;
    z-index: 1000; 
    background:#fff;
} 

#checkBoxes label { 
	display: block; 
	cursor:pointer;
	
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
  background: #ffffff;
  border: 1px solid transparent;
  border-radius: 8px;
  overflow: auto;  
  position: relative;
  margin: 15px 0;
 
  white-space: normal !important;
  -webkit-box-shadow: 0 2px 8px 0 rgba(0,0,0,.16);
  box-shadow: 0 2px 8px 0 rgba(0,0,0,.16);
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
  color: #bababa;
  font-size: 14px;
  font-weight: 550;
  margin: 0;
  padding: 7px 0 15px 0;
  width:100%;
  height:30px;
overflow:hidden;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__andress{
  color: #bababa;
  font-size: 16px;
  margin: 10px 0 0 0;
  padding:  0  0 3px;
  clear: both;
  position:relative;
  overflow:none;
} 
#shop--list<?php echo $uniqid; ?> .shop--imovel__rooms{
  color: #000;
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
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__img img {
  max-width: auto;
  max-height: auto;
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
  position: relative;
  width: 30% !important;


}
#shop--list<?php echo $uniqid; ?> .shop--imovel__img {
width: 30% ;
padding: 0px !important;
padding-right:5px;
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
#shop--list<?php echo $uniqid; ?> .shop--imovel__action a, .shop--imovel__btn a, bottom{
  background-color: <?php echo $config['listagem_cor_botao']; ?> !important;
}
#shop--list<?php echo $uniqid; ?> .shop--imovel__action a:hover, .shop--imovel__btn a:hover{
  background-color: <?php echo $config['listagem_cor_hover_botao']; ?> !important;
}
.trimText{
    white-space: nowrap;
    overflow: normal; 
    text-overflow: ellipsis
}
</style> 
<?php $tipo =  DBRead('imobiliaria_imov_categorias','*',"WHERE id_imovel = '{$id}'")[0]; 
$tipos =  DBRead('imobiliaria_categorias','*',"WHERE id = '{$tipo['id_categoria']}'")[0];
$todos_tipos =  DBRead('imobiliaria_categorias','*');
?>
<div id="shop--list<?php echo $uniqid; ?>" class="wow <?php echo $lista['efeito']; ?> shop--list__wrapper">
<!-- INÍCIO DO CAMPO DE PESQUISA -->
    <div class="row">
        <div class="col-md-2" id="find">
            <select name="acao" required class="form-control custom-select" id="acao">
                <option value="alugar" <?php Selected($imovel['acao'], "Alugar"); ?>>Alugar</option>
                <option value="comprar" <?php Selected($imovel['acao'], "Comprar"); ?>>Comprar</option>
            </select>
        </div>
        <div class="col-md-2" id="find">
            <select name="tipo"  class="form-control custom-select" id="tipo">
                <option disabled selected value="">Tipo</option>
                <?php foreach($todos_tipos as $categorias): ?>
                <option value="<?php echo $categorias['id'] ?>" <?php Selected($categorias); ?>><?php echo $categorias['nome'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-md-2" id="find">
            <select name="cidade"  class="form-control custom-select" id="cidade">
                <option disabled selected value="">Cidade</option>
                <?php foreach($imoveis as $cidade): ?>
                <option value="<?php echo $cidade['cidade'] ?>" <?php Selected($cidade); ?>><?php echo $cidade['cidade'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-md-2" id="find">
            <select name="bairro"  class="form-control custom-select" id="bairro">
                <option disabled selected value="">Bairro</option>
                <?php foreach($imoveis as $bairro): ?>
                <option value="<?php echo $bairro['bairro'] ?>" <?php Selected($bairro); ?>><?php echo $bairro['bairro'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-md-2 " id="find" style="position:relative;" >
            <div class="selectBox"	onclick="showCheckboxes()">
                <select name=""  class="form-control custom-select" id="avancado" onclick="showCheckboxes()">
                    <option disabled selected >Filtros avançados</option>
                </select>
                <div class="overSelect"></div>
            </div>

    		<div id="checkBoxes" class="form-group" style="display:none; margin-top:5px;">  
    			<label > 
    				<input type="number" placeholder="Qtd. quartos" style="width: 80%" name="quarto" id="quarto" class="form-control"> 
    			</label>
    			<label>	
    				<input type="number" placeholder="Qtd. banheiros" style="width: 80%" name="banheiro" id="banheiro"  class="form-control" > 
    			</label>
    		    <label>	
    				<input type="number" step="0.01" min="0.01" placeholder="Valor até" style="width: 80%" name="valor" id="valor"  class="form-control" > 
    			</label>
    			<label for="garagem"> 
    				<input type="checkbox" id="garagem"> 
    				Vaga garagem  
    			</label> 
    			
    			<label for="mobiliado"> 
    				<input type="checkbox" id="mobiliado" value=""> 
    				Mobiliado 
    			</label> 
    			
    			<label for="pet"> 
    				<input type="checkbox" id="pet" value=""> 
    				Aceita pet 
    			</label> 
    			<label for="livre"> 
    				<input type="checkbox" id="livre" value=""> 
    				Vista livre
    			</label> 
    			<label for="metros"> 
    				<input type="checkbox" id="metros" value=""> 
    				Metrô próximo
    			</label> 
    		</div>
    </div>
    <center>
        <div class="col-md-8" id="find">
            <input oninput="findImov(this.value)" type="text" placeholder="Onde você quer morar?" style="width: 80%" name="procurar" id="procurar" class="form-control">
            <center><span id="opcoes"></span></center>
        </div> 
        <div class="col-md-2" id="find">
            <bottom type="submit" onclick="ImobiliariaListagemFiltrado(<?php echo $id.', '.$pag ?>)" class="btn btn-primary btn-lg btn-block find"><center>Encontrar</center></bottom>
        </div> 
    </center>
    <!-- FIM DO CAMPO DE PESQUISA -->
  <div class="shop--list__content">
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
                 <span class="shop--imovel__tag" style="background-color:<?php echo $imovel['etiqueta_cor'] ?>"><?php echo $imovel['etiqueta'] ?></span> 
                <img class="shop--imovel__primary-img" src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/uploads/<?php echo $imovel['id_foto_capa']; ?>" alt="Foto Imóvel <?php echo $imovel['nome']; ?> 1">

                <?php if($segunda_foto){ ?>
                  <img class="shop--imovel__secondary-img" src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/uploads/<?php echo $segunda_foto; ?>" alt="Foto Imóvel <?php echo $imovel['nome']; ?> 2">
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
                <div class="shop--imovel__resume">
                     <?php echo $imovel['resumo'];  ?>
                </div>
                <div class="shop--imovel__andress">
                     <?php echo $imovel['rua'].", ".$imovel['cidade'];  ?>
                </div>
                <div class="shop--imovel__rooms"> 
                    <i class="fa fa-clone" aria-hidden="true"> <?php echo intval($imovel['tamanho']);  ?><span>&#13217;</span>
                    </i>
                    <i class="fa fa-bed" aria-hidden="true"> 
                         <?php echo intval($imovel['quartos']);  ?>
                    </i>
                    <i class="fa fa-car" aria-hidden="true"> 
                     <?php echo intval($imovel['quartos']);  ?>
                    </i>
                    <svg id="Layer_1" enable-background="new 0 0 512.027 512.027" height="12" viewBox="0 0 512.027 512.027" width="12" xmlns="http://www.w3.org/2000/svg"><g><path d="m16 296.013h368c8.837 0 16 7.163 16 16v40c0 8.837-7.163 16-16 16h-368c-8.837 0-16-7.163-16-16v-40c0-8.836 7.163-16 16-16z"/><path d="m512 16.022c0 72.114.155 66.992-.28 66.992-1.4 7.4-7.9 13-15.72 13h-200c-20.86 0-38.64 13.38-45.25 32h4.51c66.683 0 120.74 54.057 120.74 120.74v10.26c0 2.761-2.239 5-5 5h-342c-2.761 0-5-2.239-5-5v-10.26c0-66.683 54.057-120.74 120.74-120.74h8.15c7.99-71.9 69.12-128 143.11-128h199.996c8.839 0 16.004 7.169 16.004 16.008z"/><path d="m200 384.013c-8.836 0-16 7.164-16 16v23c0 8.836 7.164 16 16 16s16-7.164 16-16v-23c0-8.836-7.164-16-16-16z"/><path d="m296 384.013c-8.836 0-16 7.164-16 16v23c0 8.836 7.164 16 16 16s16-7.164 16-16v-23c0-8.836-7.164-16-16-16z"/><path d="m248 457.013c-8.836 0-16 7.164-16 16v23c0 8.836 7.164 16 16 16s16-7.164 16-16v-23c0-8.836-7.164-16-16-16z"/><path d="m352 457.013c-8.836 0-16 7.164-16 16v23c0 8.836 7.164 16 16 16s16-7.164 16-16v-23c0-8.836-7.164-16-16-16z"/><path d="m104 384.013c-8.836 0-16 7.164-16 16v23c0 8.836 7.164 16 16 16s16-7.164 16-16v-23c0-8.836-7.164-16-16-16z"/><path d="m152 457.013c-8.836 0-16 7.164-16 16v23c0 8.836 7.164 16 16 16s16-7.164 16-16v-23c0-8.836-7.164-16-16-16z"/><path d="m56 457.013c-8.836 0-16 7.164-16 16v23c0 8.836 7.164 16 16 16s16-7.164 16-16v-23c0-8.836-7.164-16-16-16z"/></g>
                    </svg> <i class="fa" aria-hidden="true"> <?php echo intval($imovel['quartos']);  ?></i>
                </div>
              </div>
              
            </div>
            <div class="shop--imovel__action" >
                <a class="btn btn-primary btn-lg btn-block" href="<?php echo $url;?>"><i class="fa fa-eye" aria-hidden="true"></i> Ver o Imóvel</a>
             </div>
          </div>
        </div>
      <?php }; }else{ echo "<center>Nenhum imovel encontrado</center>" ;} ?>
    </div>
  </div>
</div>






<style>
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
    }
    
}
.swal2-popup{
  font-size: 14px !important;
}
.shop--modal-add-imovel__btn{
  border: 0 !important;
  margin-top:10px !important;
  background-color: <?php echo $config['carrinho_cor_btns']; ?> !important;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__wrapper {
  background: #ffffff;
  border: 1px solid transparent;
  border-radius: 8px;
  overflow: hidden;
  position: relative;
  margin: 15px 0;
  border-color: #c3c3c3 !important;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__name {
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
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__name a {
  white-space: nowrap;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__price{
  color: #383838;
  font-size: 16px;
  font-weight: 600;
  margin: 0;
  padding: 0 0 15px;
  clear: both;
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
  color: #bababa;
  font-size: 16px;
  margin: 0;
  padding:  0  0 15px;
  clear: both;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__rooms{
  color: #000;
  font-size: 16px;
  margin: 0;
  padding:  0  0 15px;
  clear: both;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__rooms .fa-bed{

  margin: 0 10px 0;

}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__price a {
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
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__img img {
  max-width: 100%;
  max-height: 100%;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__secondary-img{
  left: 0;
  opacity: 0;
  position: absolute;
  right: 0;
  top: 0;
  transition: all 500ms ease-in-out 0s;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__wrapper:hover .shop--imovel__img{
  opacity: 0.8;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__content{
  text-align: left;
  padding: 30px 15px;
  position: relative;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__info, #Ashop--list<?php echo $uniqid; ?> .shop--imovel__action{
    border-radius: 3px;
    width: 150px !important;
    position: relative;
    word-wrap: normal !important;
    text-align: left !important;

}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__action a, #Ashop--list<?php echo $uniqid; ?> .shop--imovel__btn a{
  color: #fff !important;
  border: none;
  border-radius: 30px;
  padding: 6px 10px;
  width:150px !important;
  
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__action{
  align-content: center !important;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__name {
  color: #fff !important;
  border-radius: 30px !important;
  padding: 6px 10px !important;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__info p{
  background-color: <?php echo $config['listagem_cor_titulo']; ?> !important;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__price{
  color: <?php echo $config['listagem_cor_preco']; ?> !important;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__wrapper:hover{
  border-color: <?php echo $config['listagem_cor_borda']; ?> !important;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__action a, .shop--imovel__btn a{
  background-color: <?php echo $config['listagem_cor_botao']; ?> !important;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__action a:hover, .shop--imovel__btn a:hover{
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
<div id="Ashop--list<?php echo $uniqid; ?>" class="wow <?php echo $lista['efeito']; ?> Ashop--list__wrapper">

  <div class="Ashop--list__content">
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
            <div class="Ashop--imovel__img">
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

<script>
    		var show = true; 

		function showCheckboxes() { 
			var checkboxes = 
				document.getElementById("checkBoxes"); 

			if (show) { 
				checkboxes.style.display = "block"; 
				show = false; 
			} else { 
				checkboxes.style.display = "none"; 
				show = true; 
			} 
		} 
</script>