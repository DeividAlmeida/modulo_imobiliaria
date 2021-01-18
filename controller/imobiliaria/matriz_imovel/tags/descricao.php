<?php
ob_start();
?>
<style>
.shop--imovel-page__description{
  color: <?php echo $config['email_servidor']; ?>;
}
</style>
<div class="shop--imovel-page__description">
  <?php echo $imovel['descricao']; ?>
</div>
<?php
$descricao = ob_get_clean();
$matriz = str_replace('[WAC_IMOBILIARIA_IMOV_DESCRICAO]', $descricao, $matriz);
