<?php
    header('Access-Control-Allow-Origin: *');
	require_once('../../../includes/funcoes.php');
	require_once('../../../database/config.database.php');
	require_once('../../../database/config.php');
	$pesquisa = $_GET['pesquisa'];
	
	$elementos = DBRead('imobiliaria','*',"WHERE pesquisa LIKE '%$pesquisa%' GROUP BY pesquisa");
if(is_array($elementos) && !empty($pesquisa)){
	foreach($elementos as $key => $value){
$all .="<div onclick='escolhido(".$value['id'].", this.innerHTML)'>".$value['pesquisa']."</div>";
;}
echo $all;
}