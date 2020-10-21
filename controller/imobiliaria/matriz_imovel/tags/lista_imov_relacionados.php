<?php ob_start(); ?>

<div id="ImobiliariaRelacionadosListagem" ></div>
<script type="text/javascript">ImobiliariaRelacionadosListagem(<?php echo $imovel['id']; ?>,1);</script>
              
<?php
$html = ob_get_clean();
$matriz = str_replace('[WAC_IMOBILIARIA_LISTA_IMOV_RELACIONADOS]', $html, $matriz);
