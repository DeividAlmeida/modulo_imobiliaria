<?php
header('Access-Control-Allow-Origin: *');
require_once('../../../includes/funcoes.php');
require_once('../../../database/config.database.php');
require_once('../../../database/config.php');

if(isset($_GET['id'])){
  $id = $_GET['id'];

  $query         = DBRead('imobiliaria', "view", "WHERE id = $id");
  $contagem_view = $query[0]['view'];
  $nova_contagem = $contagem_view + 1;

  DBUpdate('imobiliaria', array('view' => $nova_contagem), "id = {$id}");
  echo $nova_contagem;
}
