<?php
error_reporting(0);
define('ROOT_PATH', dirname(__FILE__));


function atualizarMatrizesTodosImoveis(){
  $imoveis   = DBRead('imobiliaria', '*');

  foreach ($imoveis as $imovel) {
    atualizarMatrizImovel($imovel['id']);
  }
}


function atualizarMatrizImovel($id_imovel){
  // Pega configuração
  $query = DBRead('imobiliaria_config','*');

  $config = [];
  foreach ($query as $key => $row) {
    $config[$row['id']] = $row['valor'];
  }

  $query = DBRead('imobiliaria', '*', "WHERE id = $id_imovel");
  $imovel = $query[0];

  // Pega arquivo da matriz criado pelo Web Acapella
  $matriz_base = file_get_contents($config['matriz_imovel']);

  // Redefine matriz para a base da matriz que foi pega do arquivo
  $matriz = $matriz_base;

  // Buscando as categorias do imovel
  $lista_ids_categorias = DBRead('imobiliaria_imov_categorias', 'id_categoria', "WHERE id_imovel = {$imovel['id']}");

  // Varre todos os ID de categoria da lista, cria uma array, e transforma logo em seguida em uma string
  $id_categorias = array();
  foreach ($lista_ids_categorias as $linha) {
    array_push($id_categorias, $linha['id_categoria']);
  }
  $id_categorias   = implode(",", $id_categorias);
  $categorias      = DBRead('imobiliaria_categorias', '*', "WHERE id IN ($id_categorias)");

  // URL do imovel
  $nome_arquivo    =  $imovel['url'].'-'.$imovel['id'].".html";
  $url             = ConfigPainel('site_url').$nome_arquivo;

  // Carregando Fotos
  $fotos   = DBRead('imobiliaria_imov_imagens','*', "WHERE id_imovel = {$imovel['id']}");

  // Busca pela foto de capa e salva em variavel
  foreach($fotos as $foto){
    if($foto['id'] == $imovel['id_imagem_capa']){
      $foto_capa = $foto;
    }
  }

  // URL da imagem da capa
  $url_img_capa = RemoveHttpS(ConfigPainel('base_url'))."wa/imobiliaria/uploads/".$foto_capa['uniq'];

  // TAGS - troca tags pelos seus conteudos
  require_once('tags/nome.php');                            // [WAC_IMOBILIARIA_IMOV_NOME]
  require_once('tags/codigo_imov.php');                     // [WAC_IMOBILIARIA_CODIGO]
  require_once('tags/descricao.php');                       // [WAC_IMOBILIARIA_IMOV_DESCRICAO]
  require_once('tags/cabecalho.php');                       // [WAC_IMOBILIARIA_IMOV_CABECALHO]
  require_once('tags/palavras_chave.php');                  // [WAC_IMOBILIARIA_IMOV_PALAVRAS_CHAVES]
  require_once('tags/resumo.php');                          // [WAC_IMOBILIARIA_IMOV_RESUMO]
  require_once('tags/url.php');                             // [WAC_IMOBILIARIA_IMOV_URL]
  require_once('tags/imagem_url.php');                      // [WAC_IMOBILIARIA_IMOV_IMAGEM_URL]
  require_once('tags/lista_imov_mais_vistos.php');          // [WAC_IMOBILIARIA_LISTA_IMOV_MAIS_VISTOS]
  require_once('tags/lista_imov_relacionados.php');         // [WAC_IMOBILIARIA_LISTA_IMOV_RELACIONADOS]
  // [WAC_IMOBILIARIA_LISTA_IMOV_MAIS_VENDIDOS]

  require_once('header.php');
  require_once('scripts.php');
  
  
  // Salvando HTML
  $caminhos_site_url = explode('/', ConfigPainel('site_url'));

  if($caminhos_site_url[3]){
    @unlink(ROOT_PATH."/../../../../".$caminhos_site_url[3].'/'.$nome_arquivo);

    $arquivo = fopen(ROOT_PATH."/../../../../".$caminhos_site_url[3].'/'.$nome_arquivo, "w");
    fwrite($arquivo, ''.$matriz.'');
    fclose($arquivo);
  } else {
    @unlink(ROOT_PATH."/../../../../".$nome_arquivo);

    $arquivo = fopen(ROOT_PATH."/../../../../".$nome_arquivo, "w");
    fwrite($arquivo, ''.$matriz.'');
    fclose($arquivo);
  }
}

function deletarMatrizImovel($id_imovel){
  $query = DBRead('imobiliaria', '*', "WHERE id = $id_imovel");
  $imovel = $query[0];

  $nome_arquivo    =  $imovel['url'].'-'.$imovel['id'].".html";

  // Salvando HTML
  $caminhos_site_url = explode('/', ConfigPainel('site_url'));

  if($caminhos_site_url[3]){
    @unlink(ROOT_PATH."/../../../../".$caminhos_site_url[3].'/'.$nome_arquivo);
  } else {
    @unlink(ROOT_PATH."/../../../../".$nome_arquivo);
  }
}
