<?php
ob_start();
?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery.js@1.1.3/dist/js/lightgallery.min.js"></script>
  <script src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/assets/js/elevateZoom.js"></script>
  <script src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/assets/js/slick.js"></script>
  <script src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/assets/js/imovel_footer.js"></script>
</body>

<?php
$scripts  = ob_get_clean();
$matriz   = str_replace('</body>', $scripts, $matriz);
