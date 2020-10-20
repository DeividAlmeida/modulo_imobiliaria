<?php
@session_start();

function CarrinhoAddQtd($id, $qtd){
  $_SESSION["cart"][$id] += $qtd;

  $query         = DBRead('imobiliaria', "WHERE id = {$id}");
  $contagem_cart = $query[0]['count_add_cart'];

  DBUpdate('imobiliaria', array('count_add_cart' => $contagem_cart + 1), "id = {$id}");
}

function CarrinhoRemQtd($id, $qtd){
  if(isset($_SESSION["cart"][$id])){
    $qtd_final = $_SESSION["cart"][$id] - $qtd;

    if($qtd_final <= 0){
      unset($_SESSION["cart"][$id]);
    }
  }
}

function CarrinhoRemItem($id){
  unset($_SESSION["cart"][$id]);
}

function CarrinhoUpdate($id, $qtd){
  $_SESSION["cart"][$id] = $qtd;

  if($qtd <= 0){
    unset($_SESSION["cart"][$id]);
  }
}
