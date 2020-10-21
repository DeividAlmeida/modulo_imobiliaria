<?php
//
// imovel
//

// Pasta para upload dos arquivos enviados
$imovel_upload_folder = 'wa/imobiliaria/uploads/';

function deletarimovel($id){
  // Exclui todas fotos do imovel
  $lista_fotos = DBRead('imobiliaria_imov_imagens','*', "WHERE id_imovel = {$id}");
  foreach($lista_fotos as $foto){
    @unlink($imovel_upload_folder.$foto['uniq']);
  }

  deletarMatrizimovel($id);

  // Deleta no banco: imovel, imagens, imoveis relacionados e categorias relacionadas
  DBDelete('imobiliaria',"id = {$id}");
  DBDelete('imobiliaria_imov_imagens',"id_imovel = {$id}");
  DBDelete('imobiliaria_imov_relacionados',"id_imovel = {$id}");
  DBDelete('imobiliaria_imov_categorias',"id_imovel = {$id}");
}

// Adicionar imovel
if (isset($_GET['AddImovel'])) {
  $data = array(
    'nome'            => post('nome'),
    'descricao'       => post('descricao'),
    'codigo'          => post('codigo'),
    'url'             => post('url'),
    'palavras_chave'  => post('palavras_chave'),
    'preco'           => post('preco'),
    'resumo'           => post('resumo'),
    'etiqueta'        => post('etiqueta'),
    'etiqueta_cor'    => post('etiqueta_cor'),
    'a_consultar'     => post('a_consultar'),
    'tipo'            => post('tipo'),
    'link_venda'      => post('link_venda'),
    'btn_texto'       => post('btn_texto'),
    'target_link'     => post('target_link'),
    'ordem_manual'    => post('ordem_manual'),
    'tamanho'         => post('tamanho'),
    'quartos'         => post('quartos'),
    'andar'           => post('andar'),
    'banheiros'       => post('banheiros'),
    'garagem'         => post('garagem'),
    'pet'             => post('pet'),
    'sol'             => post('sol'),
    'livre'           => post('livre'),
    'mobiliado'       => post('mobiliado'),
    'estado'          => post('estado'),
    'cidade'          => post('cidade'),
    'bairro'          => post('bairro'),
    'rua'             => post('rua'),
    'metro'           => post('metro')
  );

  // Cadastra imovel e cria ID
  $id_imovel = DBCreate('imobiliaria', $data, true);

  if(!$id_imovel) { Redireciona('?ListarImovel&erro'); }

  // Cadastra todas categorias informadas
  if(isset($_POST['categorias'])){
    foreach(post('categorias') as $categoria){
      $query = DBCreate('imobiliaria_imov_categorias', array(
        'id_imovel'    => $id_imovel,
        'id_categoria'  => $categoria
      ), true);

      if(!$query) { Redireciona('?ListarImovel&erro'); }
    }
  }

  if(isset($_POST['imoveis_relacionados'])){
    foreach(post('imoveis_relacionados') as $imovel_relacionado){
      $query = DBCreate('imobiliaria_imov_relacionados', array(
        'id_imovel'              => $id_imovel,
        'id_imovel_relacionado'  => $imovel_relacionado
      ), true);

      if(!$query) { Redireciona('?ListarImovel&erro'); }
    }
  }

  // Fazendo upload das fotos arquivos
  foreach($_FILES as $chave => $valor){
    // Cria  um nome unico para o arquivo e pega ID da foto no form
    $nome_arquivo = md5(uniqid(rand(), true)).'.'.pathinfo($_FILES[$chave]['name'], PATHINFO_EXTENSION);
    $id_foto_form = str_replace("foto_","",$chave);

    // Tenta fazer upload da foto
    if (move_uploaded_file($_FILES[$chave]['tmp_name'], $imovel_upload_folder.$nome_arquivo)) {

      // Cadastra no banco de dados o nome do arquivo e ID do imovel
      $id_foto = DBCreate('imobiliaria_imov_imagens', array(
        'id_imovel'  => $id_imovel,
        'uniq'        => $nome_arquivo
      ), true);

      if(!$id_foto) { Redireciona('?ListarImovel&erro'); }

      // Se a foto selecionada como capa for essa, atualiza o banco de dados com o seu ID
      if(post('capa') == $id_foto_form){
        $query = DBUpdate('imobiliaria', array('id_imagem_capa' => $id_foto), "id = {$id_imovel}");
        if(!$query) { Redireciona('?ListarImovel&erro'); }
      }
    }
    else{
      Redireciona('?ListarImovel&erro');
    }
  }

  try{
    atualizarMatrizimovel($id_imovel);
    Redireciona('?ListarImovel&sucesso');
  } catch (\Exception $e) {
    Redireciona('?ListarImovel&erro');
  }
}

// Atualizar imovel
if (isset($_GET['AtualizarImovel'])) {
  $id_imovel   = get('AtualizarImovel');
  $data = array(
    'nome'            => post('nome'),
    'descricao'       => post('descricao'),
    'codigo'          => post('codigo'),
    'url'             => post('url'),
    'palavras_chave'  => post('palavras_chave'),
    'preco'           => post('preco'),
    'resumo'           => post('resumo'),
    'etiqueta'        => post('etiqueta'),
    'etiqueta_cor'    => post('etiqueta_cor'),
    'a_consultar'     => post('a_consultar'),
    'tipo'            => post('tipo'),
    'link_venda'      => post('link_venda'),
    'btn_texto'       => post('btn_texto'),
    'target_link'     => post('target_link'),
    'ordem_manual'    => post('ordem_manual'),
    'tamanho'         => post('tamanho'),
    'quartos'         => post('quartos'),
    'andar'           => post('andar'),
    'banheiros'       => post('banheiros'),
    'garagem'         => post('garagem'),
    'pet'             => post('pet'),
    'sol'             => post('sol'),
    'livre'           => post('livre'),
    'mobiliado'       => post('mobiliado'),
    'estado'          => post('estado'),
    'cidade'          => post('cidade'),
    'bairro'          => post('bairro'),
    'rua'             => post('rua'),
    'metro'           => post('metro')

  );

  $query = DBUpdate('imobiliaria', $data, "id = {$id_imovel}");

  if(!$query) { Redireciona('?ListarImovel&erro'); }

  $imoveis_relacionados = post('imoveis_relacionados');
  $categorias = post('categorias');

  /**
   * ATUALIZAÇÃO imoveis RELACIONADOS E CATEGORIAS
   */
  // Carrega as variaveis e caso n exista insere uma array vazia para evitar erro
  $post_imoveis_relacionados = !empty($imoveis_relacionados) ? $imoveis_relacionados : array();
  $post_categorias = !empty($categorias) ? $categorias : array();

  /**
   * ATUALIZAÇÃO CATEGORIAS
   */
  // Pegando todos os ID's da categoria do imovel atual
  $lista_ids_categorias = DBRead('imobiliaria_imov_categorias', 'id_categoria', "WHERE id_imovel = {$id_imovel}");
  $ids_categorias       = array();
  foreach ($lista_ids_categorias as $linha) {
    array_push($ids_categorias, $linha['id_categoria']);
  }

  $categorias_novas = array_diff($post_categorias, $ids_categorias);
  $categorias_para_excluir = array_diff($ids_categorias, $post_categorias);

  // Cadastra todas categorias informadas
  if(count($categorias_novas) > 0){
    foreach($categorias_novas as $categoria){
      $query = DBCreate('imobiliaria_imov_categorias', array(
        'id_imovel'    => $id_imovel,
        'id_categoria'  => $categoria
      ), true);

      if(!$query) { Redireciona('?ListarImovel&erro'); }
    }
  }

  if(count($categorias_para_excluir) > 0){
    foreach($categorias_para_excluir as $categoria){
      DBDelete('imobiliaria_imov_categorias',"id_imovel = {$id_imovel} AND id_categoria ={$categoria}");
    }
  }

  /**
   * ATUALIZAÇÃO imovel RELACIONADO
   */
  // Buscando as categorias do imovel
  $lista_ids_prod_relacionado = DBRead('imobiliaria_imov_relacionados', 'id_imovel_relacionado', "WHERE id_imovel = {$id_imovel}");
  $ids_prod_relacionado = array();
  if(is_array($lista_ids_prod_relacionado)){
    foreach ($lista_ids_prod_relacionado as $linha) {
      array_push($ids_prod_relacionado, $linha['id_imovel_relacionado']);
    }
  }

  $prod_relacionado_novo = array_diff($post_imoveis_relacionados, $ids_prod_relacionado);
  $prod_relacionado_para_excluir = array_diff($ids_prod_relacionado, $post_imoveis_relacionados);

  if(count($prod_relacionado_novo) > 0){
    foreach($prod_relacionado_novo as $imovel_relacionado){
      $query = DBCreate('imobiliaria_imov_relacionados', array(
        'id_imovel'              => $id_imovel,
        'id_imovel_relacionado'  => $imovel_relacionado
      ), true);

      if(!$query) { Redireciona('?ListarImovel&erro'); }
    }
  }

  if(count($prod_relacionado_para_excluir) > 0){
    foreach($prod_relacionado_para_excluir as $imovel_relacionado){
      DBDelete('imobiliaria_imov_relacionados',"id_imovel = {$id_imovel} AND id_imovel_relacionado ={$imovel_relacionado}");
    }
  }

  /**
   * ATUALIZAÇÃO ARQUIVOS
   */
  // Fazendo upload das fotos arquivos
  foreach($_FILES as $chave => $valor){
    // Cria  um nome unico para o arquivo e pega ID da foto no form
    $nome_arquivo = md5(uniqid(rand(), true));
    $id_foto_form = str_replace("foto_","",$chave);

    // Tenta fazer upload da foto
    if (move_uploaded_file($_FILES[$chave]['tmp_name'], $imovel_upload_folder.$nome_arquivo)) {

      // Cadastra no banco de dados o nome do arquivo e ID do imovel
      $id_foto = DBCreate('imobiliaria_imov_imagens', array(
        'id_imovel'  => $id_imovel,
        'uniq'        => $nome_arquivo
      ), true);

      if(!$id_foto) { Redireciona('?ListarImovel&erro'); }

      // Se a foto selecionada como capa for essa, atualiza o banco de dados com o seu ID
      if(post('capa') == $id_foto_form){
        $query = DBUpdate('imobiliaria', array('id_imagem_capa' => $id_foto), "id = {$id_imovel}");
        if(!$query) { Redireciona('?ListarImovel&erro'); }
      }
    }
    else{
      Redireciona('?ListarImovel&erro');
    }
  }

  /**
   * ATUALIZAÇÃO IMAGEM DE CAPA
   */
  // Confere se começa com "OLD", o que significa que vai alterar a capa para uma imagem já cadastrada
  if (strpos(post('capa'), 'old-') === 0) {
    $id_foto_capa = str_replace("old-","",post('capa'));

    $query = DBUpdate('imobiliaria', array('id_imagem_capa' => $id_foto_capa), "id = {$id_imovel}");
    if(!$query) { Redireciona('?ListarImovel&erro'); }
  }

  try{
    atualizarMatrizImovel($id_imovel);
    Redireciona('?ListarImovel&sucesso');
  } catch (\Exception $e) {
    Redireciona('?ListarImovel&erro');
  }
}

if(isset($_GET['DuplicarImovel'])){
  $id         = get('DuplicarImovel');
  $query     = DBRead('imobiliaria','*', "WHERE id = {$id}");
  $imovel   = $query[0];
  $imovel['nome'] = "Cópia de {$imovel['nome']}";
  unset($imovel['id']);

  // Cadastra imovel e cria ID
  $id_imovel = DBCreate('imobiliaria', $imovel, true);

  if(!$id_imovel) { Redireciona('?ListarImovel&erro'); }


  /**
   * ATUALIZAÇÃO CATEGORIAS
   */
  // Pegando todos os ID's da categoria do imovel atual
  $lista_ids_categorias = DBRead('imobiliaria_imov_categorias', 'id_categoria', "WHERE id_imovel = {$id}");
  $ids_categorias       = array();
  foreach ($lista_ids_categorias as $linha) {
    array_push($ids_categorias, $linha['id_categoria']);
  }

  foreach($ids_categorias as $categoria){
    $query = DBCreate('imobiliaria_imov_categorias', array(
      'id_imovel'    => $id_imovel,
      'id_categoria'  => $categoria
    ), true);

    if(!$query) { Redireciona('?ListarImovel&erro'); }
  }

  /**
   * ATUALIZAÇÃO imovel RELACIONADO
   */
  // Buscando as categorias do imovel
  $lista_ids_prod_relacionado = DBRead('imobiliaria_imov_relacionados', 'id_imovel_relacionado', "WHERE id_imovel = {$id}");
  $ids_prod_relacionado = array();
  if(is_array($lista_ids_prod_relacionado)){
    foreach ($lista_ids_prod_relacionado as $linha) {
      array_push($ids_prod_relacionado, $linha['id_imovel_relacionado']);
    }
  }

  if(count($ids_prod_relacionado) > 0){
    foreach($ids_prod_relacionado as $imovel_relacionado){
      $query = DBCreate('imobiliaria_imov_relacionados', array(
        'id_imovel'              => $id_imovel,
        'id_imovel_relacionado'  => $imovel_relacionado
      ), true);

      if(!$query) { Redireciona('?ListarImovel&erro'); }
    }
  }

  /**
   * ATUALIZAÇÃO ARQUIVOS
   */
  // Copia fotos do imovel
  $lista_ids_fotos = DBRead('imobiliaria_imov_imagens', 'uniq', "WHERE id_imovel = {$id}");
  $ids_fotos = array();
  if(is_array($lista_ids_fotos)){
    foreach ($lista_ids_fotos as $foto) {
      // Cria  um nome unico para o arquivo e pega ID da foto no form
      $nome_arquivo = md5(uniqid(rand(), true)).'.'.pathinfo($_FILES[$chave]['name'], PATHINFO_EXTENSION);

      // Copia arquivo de uma pasta para outra
      copy($imovel_upload_folder.$foto['uniq'], $imovel_upload_folder.$nome_arquivo);

      // Cadastra no banco de dados o nome do arquivo e ID do imovel
      $id_foto = DBCreate('imobiliaria_imov_imagens', array(
        'id_imovel'  => $id_imovel,
        'uniq'        => $nome_arquivo
      ), true);

      if(!$id_foto) { Redireciona('?ListarImovel&erro'); }

      // Se a foto selecionada como capa for essa, atualiza o banco de dados com o seu ID
      if($imovel['id_imagem_capa'] == $foto['id']){
        $query = DBUpdate('imobiliaria', array('id_imagem_capa' => $id_foto), "id = {$id_imovel}");
        if(!$query) { Redireciona('?ListarImovel&erro'); }
      }
    }
  }

  try{
    atualizarMatrizImovel($id_imovel);
    Redireciona('?ListarImovel&sucesso');
  } catch (\Exception $e) {
    Redireciona('?ListarImovel&erro');
  }
}

// Excluir imovel
if (isset($_GET['DeletarImovel'])) {
  $id     = get('DeletarImovel');

  try{
    deletarImovel($id);
    Redireciona('?ListarImovel&sucesso');
  } catch (\Exception $e) {
    Redireciona('?ListarImovel&erro');
  }
}

// Excluir imoveis
if (isset($_GET['ActionImovel'])) {
  $lista_ids = post('ids');

  try{
    foreach($lista_ids as $id){
      deletarImovel($id);
    }
    Redireciona('?ListarImovel&sucesso');
  } catch (\Exception $e) {
    Redireciona('?ListarImovel&erro');
  }
}


// Excluir Foto
if (isset($_GET['DeletarFotoImovel'])) {
  $id     = get('DeletarFotoImovel');

  try{
    // Exclui foto no backend e no BD
    $foto = DBRead('imobiliaria_imov_imagens','*', "WHERE id = {$id}");
    @unlink($imovel_upload_folder.$foto['uniq']);

    DBDelete('imobiliaria_imov_imagens',"id = {$id}");

    http_response_code(200);
    exit();
  } catch (\Exception $e) {
    http_response_code(500);
    exit();
  }
}
