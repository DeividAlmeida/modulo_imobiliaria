<?php
ob_start();
?>
<style>
.shop--imovel-page__description{
  color: <?php echo $config['imovel_cor_texto_descricao']; ?>;
}
</style>
<div class="shop--imovel-page__description">
  <?php echo $produto['descricao']; ?>
</div>
<?php
$descricao = ob_get_clean();
$matriz = str_replace('[WAC_IMOBILIARIA_IMOV_DESCRICAO]', $descricao, $matriz);
