<?php
if($lista['mostrar_paginacao'] == 'S'){
  $contagem_registro 	= DBCount('imobiliaria','*');

  $limite 		= $lista['paginacao'];
  $numPaginas = ceil($contagem_registro/$limite);
  $inicio 		= ($limite*$pag)-$limite;

  $imoveis   = DBRead(
    'imobiliaria',
    'imobiliaria.*, imobiliaria_imov_imagens.uniq as id_foto_capa',
    "INNER JOIN imobiliaria_imov_imagens ON imobiliaria.id_imagem_capa = imobiliaria_imov_imagens.id $acao $tipo $cidade $bairro $quartos $banheiro $garagem $mobiliado $pet $sol $livre $metro $valor $procurar
    ORDER BY imobiliaria.view DESC
    LIMIT {$inicio}, {$limite}"
  );
}
else{
  $limite 		= $lista['paginacao'];

  $imoveis   = DBRead(
    'imobiliaria',
    'imobiliaria.*, imobiliaria_imov_imagens.uniq as id_foto_capa',
    "INNER JOIN imobiliaria_imov_imagens ON imobiliaria.id_imagem_capa = imobiliaria_imov_imagens.id $acao $tipo $cidade $bairro $quartos $banheiro $garagem $mobiliado $pet $sol $livre $metro $valor $procurar
    ORDER BY imobiliaria.view DESC
    LIMIT $limite"
  );
}
