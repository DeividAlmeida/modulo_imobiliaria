<?php
//
// CATEGORIA
//

// Adicionar Categoria
if (isset($_GET['AddCategoria'])) {
  $data = array(
    'nome'            => post('nome'),
    'descricao'       => post('descricao')
  );

  $query = DBCreate('imobiliaria_categorias', $data);

  if ($query != 0) {
    Redireciona('?ListarCategoria&sucesso');
  } else {
    Redireciona('?ListarCategoria&erro');
  }
}

// Atualizar Categoria
if (isset($_GET['AtualizarCategoria'])) {
  $id   = get('AtualizarCategoria');
  $data = array(
    'nome'      => post('nome'),
    'descricao' => post('descricao')
  );

  $query = DBUpdate('imobiliaria_categorias', $data, "id = '{$id}'");
  if ($query != 0) {
    Redireciona('?ListarCategoria&sucesso');
  } else {
    Redireciona('?ListarCategoria&erro');
  }
}

// Excluir Categoria
if (isset($_GET['DeletarCategoria'])) {
  $id     = get('DeletarCategoria');
  $query  = DBDelete('imobiliaria_categorias',"id = '{$id}'");
  if ($query != 0) {
    Redireciona('?ListarCategoria&sucesso');
  } else {
    Redireciona('?ListarCategoria&erro');
  }
}
