<?php
ob_start();
?>
  <link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/assets/css/slick.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/assets/css/slick-theme.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/assets/css/imovel.css" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery.js@1.1.3/dist/css/lightgallery.css" type="text/css"/>
  <script type="text/javascript" src="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>wa/imobiliaria/assets/js/imovel_head.js"></script>
</head>

<?php
$header  = ob_get_clean();
$matriz   = str_replace('</head>', $header, $matriz);
