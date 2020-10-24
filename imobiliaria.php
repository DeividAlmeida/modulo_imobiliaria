<?php
if (isset($_GET['AdicionarItemLista'])) {
	require_once('imobiliaria/listagens/item/add.php');
}
require_once('includes/funcoes.php');
require_once('includes/header.php');
require_once('includes/menu.php');
require_once('controller/imobiliaria.php');
$TitlePage = 'Imobiliária';
$UrlPage	 = 'imobiliaria.php';
?>

<div class="has-sidebar-left">
	<header class="blue accent-3 relative nav-sticky">
		<div class="container-fluid text-white">
			<div class="row p-t-b-10 ">
				<div class="col">
					<h4><i class="icon icon-home"></i> <?php echo $TitlePage; ?></h4>
				</div>
			</div>
		</div>
	</header>

	<div class="container-fluid animatedParent animateOnce my-3">
		<div class="pb-3">

			<a class="btn btn-sm btn-primary" href="?">Inicio</a>

			<span class="dropdown">

				<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'listagem')) { ?>
					<a class="btn btn-sm btn-primary" href="#" data-toggle="dropdown">Listagens</a>
				<?php } ?>

				<div class="dropdown-menu dropdown-menu-left" x-placement="bottom-start">
					<a class="dropdown-item" href="?">Listagens cadastradas</a>
					<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'listagem', 'adicionar')) { ?>
						<a class="dropdown-item" href="?AdicionarLista">Cadastrar Listagem</a>
					<?php } ?>
				</div>
			</span>

			<span class="dropdown">

			<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'categoria')) { ?>
				<a class="btn btn-sm btn-primary d-none" href="#" data-toggle="dropdown">Categorias</a>
			<?php } ?>

				<div class="dropdown-menu dropdown-menu-left" x-placement="bottom-end">
					<a class="dropdown-item" href="?ListarCategoria">Categorias cadastradas</a>
					<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'categoria', 'adicionar')) { ?>
						<a class="dropdown-item" href="?AdicionarCategoria">Cadastrar categoria</a>
					<?php } ?>
				</div>
			</span>

			<span class="dropdown">
			<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'imovel')) { ?>
				<a class="btn btn-sm btn-primary" href="#" data-toggle="dropdown">Imóveis</a>
				<?php } ?>

				<div class="dropdown-menu dropdown-menu-left" x-placement="bottom">
					<a class="dropdown-item" href="?ListarImovel">Imóveis cadastrados</a>

					<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'imovel', 'adicionar')) { ?>
					<a class="dropdown-item" href="?AdicionarImovel">Cadastrar Imóvel</a>
<?php } ?>
				</div>
			</span>
			
			<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'configuracao', 'acessar')) { ?>
				<a class="btn btn-sm btn-primary" href="?Config">Configuração</a>
<?php } ?>
<?php if (checkPermission($PERMISSION, $_SERVER['SCRIPT_NAME'], 'codigo', 'acessar')) { ?>
			<button class="btn btn-sm behance text-white" data-toggle="modal" data-target="#Ajuda"><i class="icon-question-circle"></i></button>
<?php } ?>
		</div>

		<?php
		if (isset($_GET['Config'])) :
			require_once('imobiliaria/configuracao.php');
		elseif (isset($_GET['AdicionarCategoria'])) :
			require_once('imobiliaria/categorias/add.php');
		elseif (isset($_GET['EditarCategoria'])) :
			require_once('imobiliaria/categorias/editar.php');
		elseif (isset($_GET['ListarCategoria'])) :
			require_once('imobiliaria/categorias/listar.php');
		elseif (isset($_GET['AdicionarImovel'])) :
			require_once('imobiliaria/imoveis/add.php');
		elseif (isset($_GET['EditarImovel'])) :
			require_once('imobiliaria/imoveis/editar.php');
		elseif (isset($_GET['ListarImovel'])) :
			require_once('imobiliaria/imoveis/listar.php');
		elseif (isset($_GET['AdicionarLista'])) :
			require_once('imobiliaria/listagens/add.php');
		elseif (isset($_GET['EditarLista'])) :
			require_once('imobiliaria/listagens/editar.php');
		elseif (isset($_GET['VisualizarLista'])) :
			require_once('imobiliaria/listagens/item/listar.php');
		else :
			require_once('imobiliaria/listagens/listar.php');
		endif;
		?>
		<div class="modal fade bd-example-modal-lg" id="modalAdicionarItemListagem" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content b-0">
					<div class="modal-header r-0 bg-primary">
						<h6 class="modal-title text-white" id="exampleModalLabel">Adicionar Imóvel  na Listagem</h6>
						<a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
					</div>

					<div class="modal-body no-b">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="Ajuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content b-0">
				<div class="modal-header r-0 bg-primary">
					<h6 class="modal-title text-white" id="exampleModalLabel">Informações de Sobre o Módulo</h6>
					<a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
				</div>

				<div class="modal-body">
					<p>
						1- Recomendamos desativar efeitos parallax em páginas onde o módulo será integrado.<br>
						2- Bloqueie o acesso somente as páginas matrizes pelo robots.txt para que não sejam indexadas.<br>
					</p>
					<hr />
					<h5>Tags de Integração:</h5>
					<table class="table table-bordered table-striped">
						<tr>
							<th>Referencia</th>
							<th>Tag</th>
						</tr>

						<tr>
							<td>Imóvel - Código</td>
							<td>[WAC_IMOBILIARIA_CODIGO]</td>
						</tr>

						<tr>
							<td>Imóvel - Nome</td>
							<td>[WAC_IMOBILIARIA_IMOV_NOME]</td>
						</tr>

						<tr>
							<td>Imóvel - Descrição</td>
							<td>[WAC_IMOBILIARIA_IMOV_DESCRICAO]</td>
						</tr>

						<tr>
							<td>Imóvel - Cabeçalho</td>
							<td>[WAC_IMOBILIARIA_IMOV_CABECALHO]</td>
						</tr>

						<tr>
							<td>Imóvel - Palavras Chave</td>
							<td>[WAC_IMOBILIARIA_IMOV_PALAVRAS_CHAVES]</td>
						</tr>

						<tr>
							<td>Imóvel - Resumo</td>
							<td>[WAC_IMOBILIARIA_IMOV_RESUMO]</td>
						</tr>

						<tr>
							<td>Imóvel - URL do Imóvel</td>
							<td>[WAC_IMOBILIARIA_IMOV_URL]</td>
						</tr>

						<tr>
							<td>Imóvel - URL da imagem de destaque do Imóvel</td>
							<td>[WAC_IMOBILIARIA_IMOV_IMAGEM_URL]</td>
						</tr>

						<tr>
							<td>Imóvel - Listagem de imóveis mais vistos</td>
							<td>[WAC_IMOBILIARIA_LISTA_IMOV_MAIS_VISTOS]</td>
						</tr>

						<tr>
							<td>Imóvel - Listagem de imóveis relacionados</td>
							<td>[WAC_IMOBILIARIA_LISTA_IMOV_RELACIONADOS]</td>
						</tr>
					</table>
					<hr />

					<h5>Tags do Facebook SEO (Inserir nas Propriedades da Página em Custom meta tags):</h5>
					<code class="form-control" rows="5" readonly>
						&lt;meta property=&quot;og:title&quot; content=&quot;[WAC_IMOBILIARIA_IMOV_NOME]&quot; /&gt;<br />&lt;meta property=&quot;og:url&quot; content=&quot;[WAC_IMOBILIARIA_IMOV_URL]&quot; /&gt;<br />&lt;meta property=&quot;og:image&quot; content=&quot;[WAC_IMOBILIARIA_IMOV_IMAGEM_URL]&quot; /&gt;<br />&lt;meta property=&quot;og:description&quot; content=&quot;[WAC_IMOBILIARIA_IMOV_RESUMO]&quot; /&gt;
					</code>
					<!-- <em>Atenção: Incluir no local desejado na página matriz usando o código HTML.</em> -->
					<hr />

					<h5>Boas Práticas para uma boa indexação (SEO):</h5>
					<p>Tente utilizar esses dados como base para criar as postagens de modo que elas sejam bem indexadas pelo google:</p>
					<ul>
						<li>Titulo: Máx de 90 Caracteres</li>
						<li>Palavras Chaves: Máx de 200 Caracteres</li>
						<li>Resumo: Máx de 160 Caracteres</li>
					</ul>
				</div>
			</div>
		</div>

		<?php require_once('includes/footer.php'); ?>

		<script type="text/javascript">
			$("#DataTableListaImoveis").DataTable({
				"pageLength": 10,
				"processing": true,
				"serverSide": true,
				"ajax": "controller/imobiliaria/imoveis_listar.php",
				"paging": true,
				"lengthChange": true,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": true,
				"columnDefs": [{
					"targets": 'no-sort',
					"orderable": false,
				}],
				"language": {
					"sEmptyTable": "Nenhum registro encontrado",
					"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
					"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
					"sInfoFiltered": "(Filtrados de _MAX_ registros)",
					"sInfoPostFix": "",
					"sInfoThousands": ".",
					"sLengthMenu": "Mostrar _MENU_ resultados por página",
					"sLoadingRecords": "Carregando...",
					"sProcessing": "Processando...",
					"sZeroRecords": "Nenhum registro encontrado",
					"sSearch": "Pesquisar",
					"oPaginate": {
						"sNext": "Próximo",
						"sPrevious": "Anterior",
						"sFirst": "Primeiro",
						"sLast": "Último"
					},
					"oAria": {
						"sSortAscending": ": Ordenar colunas de forma ascendente",
						"sSortDescending": ": Ordenar colunas de forma descendente"
					}
				}
			});
			$('#formAtualizarConfig').submit(function(e) {
				e.preventDefault();
				var data = $('#formAtualizarConfig').serialize();
				$.ajax({
					data: data,
					type: "POST",
					cache: false,
					url: "imobiliaria.php?AtualizarConfig",
					beforeSend: function(data) {
						swal({
							title: 'Aguarde!',
							text: 'Estamos gerando as páginas dos imóveis atualizadas.\nNão recarregue a página até a mensagem de sucesso.',
							type: "info",
							html: true,
							showConfirmButton: true
						});
					},
					complete: function(data) {
						swal("Configurações Atualizadas!", "Configuração salvas e matrizes atualizadas com sucesso!", "success")
					}
				});
			});
			$('.adicionarListagemItem').click(function() {
				var dataURL = $(this).attr('data-href');
				$('#modalAdicionarItemListagem .modal-body').load(dataURL, function() {
					$('#modalAdicionarItemListagem').modal({
						show: true
					});
				});
			});
			$(function() {
				$('[data-toggle="tooltip"]').tooltip();

				// Select da categoria
				$('.imovel-categorias').select2();
				$('.imovel-imov_relacionados').select2();
				$('.slider-layer-imovel').select2();

				$("#ckbCheckAll").click(function() {
					$(".checkBoxClass").prop('checked', $(this).prop('checked'));
				});

				$(".checkBoxClass").change(function() {
					if (!$(this).prop("checked")) {
						$("#ckbCheckAll").prop("checked", false);
					}
				});
				$('#formActionImovel').submit(function(e) {
					var data = $(this).serializeArray();
					console.log(data);
					e.preventDefault();
					swal({
						title: "Você tem certeza?",
						text: "Deseja realmente deletar esses imóveis?",
						type: "warning",
						buttons: {
							cancel: "Não",
							confirm: {
								text: "Sim",
								className: "btn-primary",
							},
						},
						closeOnCancel: false
					}).then(function(isConfirm) {
						if (isConfirm) {
							$('#formActionImovel').off("submit").submit();
						}
					});
				});
			});
		</script>

		<?php if (isset($_GET['AdicionarImovel']) || isset($_GET['EditarImovel'])) { ?>
			<script type="text/javascript" src="css_js/speakingurl.min.js"></script>
			<script type="text/javascript" src="css_js/jquery.stringtoslug.min.js"></script>
			<script src="css_js/jquery.multifield.min.js"></script>
			<script type="text/javascript">
				// Função: Gerador de ID único
				var ID = function() {
					return Math.random().toString(36).substr(2, 9);
				};

				// Adiciona uma linha de foto no imovel
				function addLinhaFotoImovel() {
					id = ID();
					$("#foto-wrapper tbody").append("\
				<tr id='foto-" + id + "'> \
					<td><input name='foto_" + id + "' type='file' accept='image/*' required/></td> \
					<td><input class='form-check-input' name='capa' type='radio' value='" + id + "' required> Capa do Imóvel</td> \
					<td><button type='button' id='imovel-rem-" + id + "' class='imovel-rem-form btn btn-sm btn-danger float-right'>Deletar</button></td> \
				</tr> \
			");
				}

				function ExcluirFotoImovel(id) {
					swal({
						title: "Você tem certeza?",
						text: "Deseja realmente deletar esta foto?",
						type: "warning",
						buttons: {
							cancel: "Não",
							confirm: {
								text: "Sim",
								className: "btn-primary",
							},
						},
						closeOnCancel: false
					}).then(function(isConfirm) {
						if (isConfirm) {
							$.ajax({
								type: "GET",
								cache: false,
								url: '?DeletarFotoImovel=' + id + '',
								success: function(data) {
									swal("Sucesso!", "A foto foi excluída com sucesso", "success");
									$("#foto-" + id).remove();

									contagem_fotos = $("#fotos-adicionadas-wrapper tbody tr").length;

									if (contagem_fotos == 0) {
										addLinhaFotoImovel();
									}
								}
							});
						} else {
							swal("Cancelado", "O procedimento foi cancelado", "error");
						}
					});
				}

				$(document).ready(function() {
					// Quando usuário clica em add foto, executa função de add foto
					$('#imovel-add-foto').click(function() {
						addLinhaFotoImovel();
					});

					// Quando usuário clica em remover foto, executa função de excluir foto
					$('#foto-wrapper').on('click', '.imovel-rem-form', function() {
						// Pega ID do botão
						btn_id = $(this).attr('id');

						// Pega o ID do ID
						id = btn_id.split("imovel-rem-");

						// Remove a DIV com todos campos
						$("#foto-" + id[1]).remove();
					});

					// Input da URL do imovel sem espaço
					$(".imovel-nome").stringToSlug({
						setEvents: 'keyup keydown blur',
						getPut: ".imovel-url"
					});

					// Sempre que muda o tipo do imovel, habilita ou desabilita campos
					$('[name^="tipo"]').change(function() {
						if ($(this).val() == 'orcamento') {
							$('[name^="link_venda"]').attr({
								disabled: true,
								required: false
							});
						} else {
							$('[name^="link_venda"]').attr({
								disabled: false,
								required: true
							});
						}
					});
					$( document ).ready(function() {
						$('#input_group').multifield({
							section: '.groupItens',
							btnAdd:'.btnAdd',
							btnRemove:'.btnRemove',
							locale:{
							"multiField": {
								"messages": {
								"removeConfirmation": "Deseja realmente remover este campo?"
								}
							}
							}
						});
					});
					<?php if (isset($_GET['AdicionarImovel'])) { ?>
						addLinhaFotoImovel();
					<?php } ?>
					<?php if (isset($_GET['EditarImovel'])) { ?>
						$('.imovel-categorias').val([<?php echo $string_ids_categorias; ?>]).change();
						$('.imovel-imov_relacionados').val([<?php echo $string_ids_imov_relacionado; ?>]).change();
					<?php } ?> 
				});
			</script>
		<?php } ?>