<?php $query = DBRead('imobiliaria_cidades','*'); ?>

<div class="card">
  <div class="card-header white">
    <strong>Cidade</strong>

    <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'cidade', 'adicionar')) { ?>
      <a class="btn btn-sm btn-primary" href="?AdicionarCidade">Adicionar</a>
      <?php } ?>
  </div>

  <?php if (is_array($query)) {  ?>
    <div class="card-body p-0">
      <div>
        <div>
          <table id="DataTable" class="table m-0 table-striped">
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Bairros</th>
              <?php if (DadosSession('nivel') == 1) { ?>
              <th width="53px">Ações</th>
              <?php } ?>
            </tr>

            <?php foreach ($query as $dados) { ?>
              <tr>
                <td><?php echo $dados['id']; ?></td>
                <td><?php echo $dados['nome']; ?></td>
                <td>
                <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'bairro', 'adicionar')) { ?>
                    <a class="adicionarListagemItem tooltips" data-tooltip="Adicionar" href="?AdicionarBairro=<?php echo $dados['nome']; ?>">
                        <i class="icon-plus blue lighten-2 avatar"></i>
                        <span class="inner">Adicionar</span>
                    </a>
                <?php } ?>
                <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'bairro', 'editar')) { ?>
                    <a class="tooltips" data-tooltip="Visualizar" href="?ListarBairro=<?php echo $dados['nome']; ?>">
                        <i class="icon-eye blue lighten-2 avatar"></i>
                      <span class="inner">Visualizar</span>
                    </a>
                <?php } ?>
                </td>
                <?php if (DadosSession('nivel') == 1) { ?>
                  <td>
                    <div class="dropdown">
                      <a class="" href="#" data-toggle="dropdown">
                        <i class="icon-apps blue lighten-2 avatar"></i>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                      <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'cidade', 'editar')) { ?>
                        <a class="dropdown-item" href="?EditarCidade=<?php echo $dados['id']; ?>"><i class="text-primary icon icon-pencil"></i> Editar</a>
                        <?php } ?>

                        <?php if ($dados['id'] != 0) { ?>
                          <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'cidade', 'deletar')) { ?>
                            <a class="dropdown-item" onclick="DeletarItem(<?php echo $dados['id']; ?>, 'DeletarCidade');" href="#!"><i class="text-danger icon icon-remove"></i> Excluir</a>
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
    <?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'cidade', 'adicionar')) { ?>
      <div class="alert alert-info">Nenhum cidade adicionada até o momento, <a href="?AdicionarCidade">clique aqui</a> para adicionar.</div>
      <?php } ?>
    </div>
  <?php } ?>
</div>
