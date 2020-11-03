<?php
  if(!checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'categoria', 'adicionar')){ Redireciona('./index.php'); }
?>

<form method="post" action="?AddBairro=<?php echo $_GET['AdicionarBairro'];?>">
  <div class="card">
    <div class="card-header white">
      <strong>Cadastrar Bairros</strong>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">

          <!-- NOME -->
          <div class="form-group">
            <label>Nome: </label>
            <input class="form-control" name="bairro" required>
          </div>

          <button class="btnSubmit btn btn-primary float-right" type="submit">Cadastrar</button>
        </div>
      </div>
    </div>
  </div>
</form>
