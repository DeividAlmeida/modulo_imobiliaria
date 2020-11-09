<?php
header('Access-Control-Allow-Origin: *');
require_once('../../../includes/funcoes.php');
require_once('../../../database/config.database.php');
require_once('../../../database/config.php');
 $todos_tipos =  DBRead('imobiliaria_categorias','*');
   $query = DBRead('imobiliaria_config','*');
  $config = [];
  foreach ($query as $key => $row) {
    $config[$row['id']] = $row['valor'];
  }
?>
<style>
select {
    cursor:pointer;
}

#opcoes{
    position: absolute;
    z-index: 1000;
    background: #fff;
    max-height: 100px !important;
    width: 76%;
    overflow-y: scroll;
    left: 12%;
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
    background:<?php echo $config['busca_btn_cor']?> !important;
    border: 0 !important;
    color: <?php echo $config['busca_btn_cor_texto']?> !important;;
}
.find:hover{

    background:<?php echo $config['busca_btn_cor_hover']?> !important;
    border: 0 !important;

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
	cursor:pointer;
} 

#checkBoxes { 
	display: none; 
    position: absolute;
    z-index: 1000; 
	background:transparent;
} 

#checkBoxes label { 
	display: block; 
	cursor:pointer;
	
} 

</style>
<form class="shop--search-bar" method="GET" action="<?php echo $config['pagina_resultado_busca']."?pag=".$config['busca_limite_pagina']; ?> " onsubmit="store()">
<!-- INÍCIO DO CAMPO DE PESQUISA -->
    <div class="row">
        <div class="col-md-2" id="find">
            <select name="acao" required class="form-control custom-select" id="acao">
                <option value="alugar" >Alugar</option>
                <option value="comprar">Comprar</option>
            </select>
        </div>
        <div class="col-md-2" id="find">
            <select name="tipo"  class="form-control custom-select" id="tipo" >
                <option disabled selected value="">Tipo</option>
                <?php foreach($todos_tipos as $categorias): ?>
                <option value="<?php echo $categorias['id'] ?>" <?php Selected($categorias); ?>><?php echo $categorias['nome'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-md-3" id="find">
            <select name="cidade" onchange="bairros(this.value)" class="form-control custom-select" id="cidade">
                <option disabled selected value="">Cidade</option>
                <?php $cidades = DBRead('imobiliaria','*','GROUP BY cidade');
                foreach($cidades as $cidade): ?>
                <option value="<?php echo $cidade['cidade'] ?>" <?php Selected($cidade); ?>><?php echo $cidade['cidade'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-md-2" id="find option">
            <span id="bairros_filtrados">
                <select name="bairro"  class="form-control custom-select" id="bairro">
                    <option value="" disabled selected>Bairro</option>
                </select>
            </span>
        </div>
        <div class="col-md-2 " id="find" style="position:relative;" >
            <div class="selectBox"	onclick="showCheckboxes()">
                <select name=""  class="form-control custom-select" id="avancado" onclick="showCheckboxes()">
                    <option disabled selected >Filtros avançados</option>
                </select>
                <div class="overSelect"></div>
            </div>

    		<div id="checkBoxes" class="form-group" style="display:none; margin-top:5px; padding-left: 15px;">  
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
    				<input type="checkbox" name="mobiliado" id="mobiliado" value=""> 
    				Mobiliado 
    			</label> 
    			
    			<label for="pet"> 
    				<input type="checkbox" name="pet" id="pet" value=""> 
    				Aceita pet 
    			</label> 
    			<label for="livre"> 
    				<input type="checkbox" name="livre" id="livre" value=""> 
    				Vista livre
    			</label> 
    			<label for="metros"> 
    				<input type="checkbox" name="metros" id="metros" value=""> 
    				Metrô próximo
    			</label> 
    		</div>
    </div>
    <center>
        <div class="col-md-9" id="find">
            <input oninput="findImov(this.value)" type="text" placeholder="Onde você quer morar?" style="width: 80%" name="procurar" id="procurar" class="form-control">
            <center><span id="opcoes"></span></center>
        </div>  
        <div class="col-md-2" id="find">
            <button type="submit"  class="btn btn-primary btn-lg btn-block find">Encontrar</button>
        </div> 
    </center>
<!-- FIM DO CAMPO DE PESQUISA -->

</form>

<script>
var show = true; 


function store(){
let arr = [
    document.getElementById('acao').value,
    document.getElementById('tipo').value,
    document.getElementById('cidade').value,
    document.getElementById('bairro').value,
    document.getElementById('quarto').value,
    document.getElementById('banheiro').value,
    document.getElementById('valor').value,
    document.getElementById('garagem').checked,
    document.getElementById('mobiliado').checked,
    document.getElementById('pet').checked,
    document.getElementById('livre').checked,
    document.getElementById('metros').checked,
    document.getElementById('procurar').value
]; 
    for(let i =0; i< arr.length; i++){
        sessionStorage[i] = arr[i];
    }
}


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
function findImov (w){
    var b =" " ;
    document.getElementById('opcoes').style.visibility="visible";
    fetch(UrlPainel+'wa/imobiliaria/listagem/api.php?pesquisa='+w).then( (resposta) =>{
        resposta.text().then((data)=>{

            document.getElementById('opcoes').innerHTML = data;
        });
    }).catch(document.getElementById('opcoes').innerHTML = "Nenhum imóvel encontrado");
}
function escolhido (z, y)  {
    document.getElementById('procurar').value = y;
    document.getElementById('opcoes').style.visibility="hidden";
}

function bairros(x){
    
    fetch(UrlPainel+'wa/imobiliaria/listagem/bairro_api.php?cidade='+x).then((prom)=>{
        prom.text().then((dados)=>{
            let as = document.getElementById('bairros_filtrados').innerHTML = dados ;
   
        })
    });
}

</script>