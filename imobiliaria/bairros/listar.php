<?php
 $cidade = $_GET['ListarBairro'];
 $query = DBRead('imobiliaria_bairros','*', "WHERE cidade = '{$cidade}'"); ?>

<div class="card">
  <div class="card-header white">
    <strong>Bairro</strong>

    <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'categoria', 'adicionar')) { ?>
      <a class="btn btn-sm btn-primary" href="?AdicionarBairro=<?php echo $_GET['ListarBairro'];?>">Adicionar</a>
      <?php } ?>
  </div>

  <?php if (is_array($query)) {  ?>
    <div class="card-body p-0">
      <div>
        <div>
          <table id="DataTable" class="table m-0 table-striped">
            <tr>
              <th>ID</th>
              <th>Bairro</th>              
              <?php if (DadosSession('nivel') == 1) { ?>
              <th width="53px">Ações</th>
              <?php } ?>
            </tr>

            <?php foreach ($query as $dados) { ?>
              <tr>
                <td><?php echo $dados['id']; ?></td>                
                <td><?php echo $dados['bairro']; ?></td>
                
                <?php if (DadosSession('nivel') == 1) { ?>
                  <td>
                    <div class="dropdown">
                      <a class="" href="#" data-toggle="dropdown">
                        <i class="icon-apps blue lighten-2 avatar"></i>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                      <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'categoria', 'editar')) { ?>
                        <a class="dropdown-item"  href="?EditarBairro=<?php echo $dados['id']; ?>"><i class="text-primary icon icon-pencil"></i> Editar</a>
                        <?php } ?>

                        <?php if ($dados['id'] != 0) { ?>
                          <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'categoria', 'deletar')) { ?>
                            <a class="dropdown-item" onclick="DeletarItem(<?php echo $dados['id']; ?>, 'DeletarBairro');" href="#!"><i class="text-danger icon icon-remove"></i> Excluir</a>
                            <?php } ?>
                        <?php } ?>
                      </div>
                    </div>
                  </td>
                <?php } ?>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <div class="card-body">
    <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'categoria', 'adicionar')) { ?>
      <div class="alert alert-info">Nenhum bairro adicionado até o momento, <a href="?AdicionarBairro">clique aqui</a> para adicionar.</div>
      <?php } ?>
    </div>
  <?php } ?>
</div>
