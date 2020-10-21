<?php ob_start(); ?>

<div id="ImobiliariaMaisVistos" ></div>
<script type="text/javascript">ImobiliariaMaisVistos(<?php echo $imovel['id']; ?>,1);</script>
              
<?php
$html = ob_get_clean();
$matriz = str_replace('[WAC_IMOBILIARIA_LISTA_IMOV_MAIS_VISTOS]', $html, $matriz);
