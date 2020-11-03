<?php
//
// CATEGORIA
//

// Adicionar Categoria
if (isset($_GET['AddCidade'])) {
  $data = array(
    'nome'            => post('nome'),
    'descricao'       => post('descricao')
  );

  $query = DBCreate('imobiliaria_cidades', $data);

  if ($query != 0) {
    Redireciona('?ListarCidade&ListarCategoria&sucesso');
  } else {
    Redireciona('?ListarCidade&ListarCategoria&erro');
  }
}

// Atualizar Categoria
if (isset($_GET['AtualizarCidade'])) {
  $id   = get('AtualizarCidade');
  $data = array(
    'nome'      => post('nome'),
    'descricao' => post('descricao')
  );

  $query = DBUpdate('imobiliaria_cidades', $data, "id = '{$id}'");
  if ($query != 0) {
    Redireciona('?ListarCidade&ListarCategoria&sucesso');
  } else {
    Redireciona('?ListarCidade&ListarCategoria&erro');
  }
}

// Excluir Categoria
if (isset($_GET['DeletarCidade'])) {
  $id     = get('DeletarCidade');
  $query  = DBDelete('imobiliaria_cidades',"id = '{$id}'");
  if ($query != 0) {
    Redireciona('?ListarCidade&ListarCategoria&sucesso');
  } else {
    Redireciona('?ListarCidade&ListarCategoria&erro');
  }
}

// Adicionar Bairro
if (isset($_GET['AddBairro'])) {
    
  $cidade = $_GET['AddBairro'];
  $data = array(
    'cidade'            => $cidade,
    'bairro'       => post('bairro')
  );

  $query = DBCreate('imobiliaria_bairros', $data);

  if ($query != 0) {
    Redireciona('?ListarCidade&ListarCategoria&sucesso');
  } else {
    Redireciona('?ListarCidade&ListarCategoria&erro');
  }
}

// Editar Bairro
if (isset($_GET['AtualizarBairro'])) {
    
  $id = $_GET['AtualizarBairro'];
  $data = array(
    'bairro'       => post('bairro')
  );

 $query = DBUpdate('imobiliaria_bairros', $data, "id = '{$id}'");

  if ($query != 0) {
    Redireciona('?ListarCidade&ListarCategoria&sucesso');
  } else {
    Redireciona('?ListarCidade&ListarCategoria&erro');
  }
}

// Excluir Bairro
if (isset($_GET['DeletarBairro'])) {
  $id     = get('DeletarBairro');
  $query  = DBDelete('imobiliaria_bairros',"id = '{$id}'");
  if ($query != 0) {
    Redireciona('?ListarCidade&ListarCategoria&sucesso');
  } else {
    Redireciona('?ListarCidade&ListarCategoria&erro');
  }
}