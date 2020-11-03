<?php
if(!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'categoria', 'editar')){ Redireciona('./index.php'); }
$id     = get('EditarBairro');
$query  = DBRead('imobiliaria_bairros','*',"WHERE id = '{$id}'");
if (is_array($query)) {
  foreach ($query as $dados) { ?>
    <form method="post" action="?AtualizarBairro=<?php echo $id; ?>">
      <div class="card">
        <div class="card-header  white">
          <strong>Editar Bairro</strong>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">

              <!-- NOME -->
              <div class="form-group">
                <label>Nome: </label>
                <input class="form-control" name="bairro" required value="<?php echo $dados['bairro'] ;?>">
              </div>

              <button class="btnSubmit btn btn-primary float-right" type="submit">Atualizar</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  <?php
  }
}
?>
