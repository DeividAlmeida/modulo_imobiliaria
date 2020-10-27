<?php
// Pegando informações da listagem (categorias da lista)
$categorias_lista = DBRead('imobiliaria_lista_categoria','id_categoria',"WHERE id_lista = '{$id}'");

$ids_categoria = array();

if(count($categorias_lista) == 0){
  ?>
    Insira uma categoria para exibir seus imoveis.
  <?php
  exit;
}
foreach ($categorias_lista as $linha) {
  array_push($ids_categoria, $linha['id_categoria']);
}
$ids_categoria = implode(",", $ids_categoria);

// Busca o imovel baseado nos resultados anteriores
$lista_imoveis = DBRead('imobiliaria_imov_categorias','id_imovel',"WHERE id_categoria IN ($ids_categoria)");

$ids_imoveis = array();
foreach ($lista_imoveis as $linha) {
  array_push($ids_imoveis, $linha['id_imovel']);
}

if(count($ids_imoveis) == 0){
  ?>
    Não há imoveis para exibir nessa listagem com essas configurações. Confira as configurações e os imoveis cadastrados.
  <?php
  exit;
}

if(is_array($ids_imoveis)){
  $ids_imoveis = implode(",", $ids_imoveis);
}
else {
  $ids_imoveis = false;
}

if($lista['mostrar_paginacao'] == 'S'){
  $contagem_registro 	= DBCount('imobiliaria','*',"WHERE id IN ($ids_imoveis) ORDER BY {$lista['ordenar_por']} {$lista['asc_desc']}");

  $limite 		= $lista['paginacao'];
  $numPaginas = ceil($contagem_registro/$limite);
  $inicio 		= ($limite*$pag)-$limite;

  if(!$ids_imoveis){
    $imoveis = array();
  }
}
else{
  if(!$ids_imoveis){
    $imoveis = array();
  }
  else{
    $limite 		= $lista['paginacao'];

    $imoveis   = DBRead(
      'imobiliaria',
      'imobiliaria.*, imobiliaria_imov_imagens.uniq as id_foto_capa',
      "INNER JOIN imobiliaria_imov_imagens ON imobiliaria.id_imagem_capa = imobiliaria_imov_imagens.id
      WHERE imobiliaria.id IN ($ids_imoveis) $acao $tipo $cidade $bairro $quartos $banheiro $garagem $mobiliado $pet $sol $livre $metro $valor
      ORDER BY imobiliaria.{$lista['ordenar_por']} {$lista['asc_desc']}
      LIMIT $limite"
    );
  }
}
