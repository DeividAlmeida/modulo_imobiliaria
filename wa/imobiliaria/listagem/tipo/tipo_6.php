<?php
if($lista['mostrar_paginacao'] == 'S'){
  $contagem_registro 	= DBCount('imobiliaria','*',"WHERE acao = 'comprar'");

  $limite 		= $lista['paginacao'];
  $numPaginas = ceil($contagem_registro/$limite);
  $inicio 		= ($limite*$pag)-$limite;
  $acao = " AND imobiliaria.acao = 'comprar'";

  $imoveis   = DBRead(
    'imobiliaria',
    'imobiliaria.*, imobiliaria_imov_imagens.uniq as id_foto_capa',
    "INNER JOIN imobiliaria_imov_imagens ON imobiliaria.id_imagem_capa = imobiliaria_imov_imagens.id $acao
    ORDER BY imobiliaria.{$lista['ordenar_por']} {$lista['asc_desc']}
    LIMIT {$inicio}, {$limite}"
  );
}
else{
  $limite 		= $lista['paginacao'];

  $imoveis   = DBRead(
    'imobiliaria',
    'imobiliaria.*, imobiliaria_imov_imagens.uniq as id_foto_capa',
    "INNER JOIN imobiliaria_imov_imagens ON imobiliaria.id_imagem_capa = imobiliaria_imov_imagens.id $acao
    ORDER BY imobiliaria.{$lista['ordenar_por']} {$lista['asc_desc']}
    LIMIT $limite"
  );
}
