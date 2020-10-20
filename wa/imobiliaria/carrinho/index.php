<?php
session_start();
header('Access-Control-Allow-Origin: *');
require_once('../../../includes/funcoes.php');
require_once('../../../database/config.database.php');
require_once('../../../database/config.php');
require_once('controller.php');

$query = DBRead('imobiliaria_config','*');

$config = [];
foreach ($query as $key => $row) {
  $config[$row['id']] = $row['valor'];
}

$total_carrinho = 0;
?>
<style>
.shop--cart .btn, #formCarrinhoSucesso .btn{
  border: 0;
  background-color: <?php echo $config['carrinho_cor_btns']; ?> !important;
}
#cartCheckout{
	background-color: <?php echo $config['carrinho_cor_btn_finalizar']; ?> !important;
}
</style>

<div class="shop--cart">

<?php
if(isset($_SESSION["cart"]) && is_array($_SESSION["cart"]) && count($_SESSION["cart"]) > 0){
?>
	<div class="shop--cart__block"></div>
	<div class="table-responsive">
	<table id="shop--cart--table" class="shop--cart--table table m-0 table-striped">
	  <tr>
	    <th>Imagem</th>
	    <th>Imóvel</th>
	    <th>Quantidade</th>
	    <th>Preço</th>
	    <th>Total</th>
	  </tr>

	  <?php
	 	$br = "%0a";
		$whatsapp = "";
		$whatsapp .= "Solicitação de Orçamento N° ".rand(1, 9999)." {$br}";
		$whatsapp .= "{$br}";

	  	foreach($_SESSION["cart"] as $id => $qtd ){
	    $query = DBRead('imobiliaria', '*', "WHERE id = $id");
	    $imovel = $query[0];

	    // Carregando Fotos do imovel
	    $fotos  = DBRead('imobiliaria_prod_imagens','*', "WHERE id_imovel = {$imovel['id']}");

	    // Busca pela foto de capa e salva em variavel
	    foreach($fotos as $foto){
	      if($foto['id'] == $imovel['id_imagem_capa']){
	        $foto_capa = $foto;
	      }
	    }

	    // URL da imagem da capa
	    $url_img_capa = RemoveHttpS(ConfigPainel('base_url'))."wa/imobiliaria/uploads/".$foto_capa['uniq'];
	    
	    if ($imovel['a_consultar'] <> 'S') {
	    	$total_carrinho += $imovel['preco']*$qtd;
		}
		
		$whatsapp .= "Imovel: ".urlencode($imovel['nome'])." {$br}";
		$whatsapp .= "Qnt: ".$qtd." {$br}";
		$whatsapp .= "Preço: ".number_format($imovel['preco'], 2, ',', '.')." {$br}";
		$whatsapp .= "Sub-total: ".number_format($imovel['preco']*$qtd, 2, ',', '.')." {$br}";
		$whatsapp .= "{$br}";
	    
	  ?>

	    <tr>
	      <td><img src="<?php echo $url_img_capa ?>" alt="Foto Imóvel <?php echo $imovel['nome']; ?>" width="100"></td>
	      <td><?php echo $imovel['nome']; ?></td>
	      <td id="cart_qtd_<?php echo $imovel['id']; ?>">
					<input class="cart_qtd" type="number" value="<?php echo $qtd; ?>"/>
					<button class="cart_qtd_update btn btn-sm btn-primary">Atualizar</button>
					<button class="cart_qtd_delete btn btn-sm btn-primary">Remover</button>
				</td>
		<?php if ($imovel['a_consultar'] <> 'S') { ?>
	      <td><?php echo $config['moeda'].''.number_format($imovel['preco'], 2, ',', '.'); ?></td>
	      <td><?php echo $config['moeda'].' '.number_format($imovel['preco']*$qtd, 2, ',', '.'); ?></td>
	  	<?php } else { ?>
	  		<td>A Consultar</td>
	      	<td>A Consultar</td>
	  	<?php } ?>
	    </tr>
	  <?php } ?>

	  <?php
		  $whatsapp .= "*Total: ".$config['moeda'].' '.number_format($total_carrinho, 2, ',', '.')."* {$br}";
	  ?>
		<tr>
			<td colspan="3"></td>
			<td><strong>Total</strong></td>
			<td><?php echo $config['moeda'].' '.number_format($total_carrinho, 2, ',', '.'); ?></td>
		</tr>
	</table>
	</div>


	<div class="row">
		<div class="col-xs-6 text-left">
			<button id="cartPrint" class="btn btn-primary">Imprimir pedido</button>
		</div>
		<div class="col-xs-6 text-right">
			<?php if($config['tipo_orcamento'] == 'email'): ?>
				<button id="cartCheckout" class="btn btn-primary" data-toggle="modal" data-target="#modalSignUp">Finalizar Pedido</button>
			<?php else: ?>
				<a target="_blank" href="https://api.whatsapp.com/send?phone=<?= str_replace('+','',$config['whatsapp']); ?>&text=<?= $whatsapp; ?>&source=&data=&app_absent=" class="btn btn-primary" >Finalizar Pedido</a>
			<?php endif; ?>
			
		</div>
	</div>


	<div class="modal tc-modal fade" id="modalSignUp">
		<div class="modal-dialog">
			<div class="modal-content modal-padding">
				<div class="modal-header">
					<i class="fa fa-close close" data-dismiss="modal"></i>
					<h4 class="modal-title">Finalizar Pedido</h4>
				</div>
				<form id="formCarrinho" class="tc-form-style2">
					<div class="form-field">
						<input name="nome" type="text" placeholder="Nome" required>
					</div>
					<div class="form-field">
						<input name="email" type="email" placeholder="Email" required>
					</div>
					<div class="form-field">
						<input name="telefone" type="text" placeholder="Telefone" required>
					</div>
					<div class="form-field">
						<input name="whatsapp" type="text" placeholder="Whatsapp">
					</div>
					<div class="form-field">
						<textarea name="observacoes" cols="30" rows="10" placeholder="Observações"></textarea>
					</div>
					<div class="form-button">
						<button class="btnSubmit" type="submit">Enviar Orçamento</button>
					</div>
				</form>

        <div id="formCarrinhoSucesso" style="display:none;">
          <p>Email enviado com sucesso!</p>
          <a class="btn btn-primary" href="<?php echo ConfigPainel('site_url'); ?>" style="margin-top:10px">Voltar para home</a>
        </div>
			</div>
		</div>
	</div>
<? } else {?>
	<span>Seu carrinho está vazio!</span>
<? } ?>

</div>
<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>epack/css/elements/form.css">
<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>epack/css/elements/animate.css">
<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>epack/css/elements/modal.css">
<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/assets/css/carrinho.css">
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/assets/js/carrinho.js"></script>
