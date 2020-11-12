<?php
header('Access-Control-Allow-Origin: *');
require_once('../../../includes/funcoes.php');
require_once('../../../database/config.database.php');
require_once('../../../database/config.php');

// Pegar listagem
$uniqid = uniqid();

if (ModoManutencao()) { header("Location: ../manutencao.php"); }

// Pega configuração
$query = DBRead('imobiliaria_config','*');

$config = [];
foreach ($query as $key => $row) {
  $config[$row['id']] = $row['valor'];
}

$imoveis   = DBRead(
  'imobiliaria',
  'imobiliaria.*, imobiliaria_imov_imagens.uniq as id_foto_capa',
  "INNER JOIN imobiliaria_imov_imagens ON imobiliaria.id_imagem_capa = imobiliaria_imov_imagens.id ORDER BY imobiliaria.view DESC LIMIT 3"
);
$tamanho_coluna = 4;

// Escolhendo arquivo para o estilo

require_once('../listagem/includes/estilo_4.php');
?>
<style>
#shop--list<?php echo $uniqid; ?> .shop--imovel__wrapper{
        display:none !important;
}
#Ashop--list<?php echo $uniqid; ?> .shop--imovel__wrapper{
        display:block !important;
        margin: 15px 0 15px !important;
}
</style>
<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>/epack/css/elements/animate.css">
