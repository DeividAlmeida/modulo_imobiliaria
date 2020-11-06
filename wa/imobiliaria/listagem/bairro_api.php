<?php
    header('Access-Control-Allow-Origin: *');
	require_once('../../../includes/funcoes.php');
	require_once('../../../database/config.database.php');
	require_once('../../../database/config.php');
	$pesquisa = $_GET['cidade'];
	
	$elementos = DBRead('imobiliaria','*',"WHERE cidade = '{$pesquisa}' GROUP BY '{bairro}'");
if(is_array($elementos) && !empty($pesquisa)){
	foreach($elementos as $key => $value){
$all .="<option value='".$value['bairro']."'>".$value['bairro']."</option>";
;}
echo '<select name="bairro"  class="form-control custom-select" id="bairro"><option value="" disabled selected>Bairro</option>'.$all.'</select>';
}