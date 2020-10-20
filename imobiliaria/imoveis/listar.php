<form id="formActionImovel" action="?ActionImovel" method="post" class="card">
  <div class="card-header white">
    <strong>Imóveis</strong>

    <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'imovel', 'adicionar')) { ?>
      <a class="btn btn-sm btn-primary" href="?AdicionarImovel">Adicionar</a>
      <?php } ?>

      <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'imovel', 'deletar')) { ?>
        <button class="btn btn-sm btn-primary" name="excluir" type="submit">Excluir em Massa</button>
        <?php } ?>
  </div>

  <div class="table-responsive" style="padding: 10px 0">
    <table id="DataTableListaImoveis" class="table table-striped">
      <thead>
        <tr>
          <th class="no-sort" style="font-weight: bold;"><input type="checkbox" id="ckbCheckAll" /></th>
          <th style="font-weight: bold;">ID</th>
          <th class="no-sort" style="font-weight: bold;">FOTO CAPA</th>
          <th style="font-weight: bold;">NOME</th>
          <th class="no-sort" style="font-weight: bold;">AÇÕES</th>
        </tr>
      </thead>
    </table>
  </div>
</form>
