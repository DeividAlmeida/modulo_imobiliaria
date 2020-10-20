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
switch ($config['listagem_estilo']) {
	case 1:
		require_once('../listagem/includes/estilo_1.php');
		break;

	case 2:
		require_once('../listagem/includes/estilo_2.php');
		break;

	case 3:
		require_once('../listagem/includes/estilo_3.php');
		break;

	case 4:
		require_once('../listagem/includes/estilo_4.php');
		break;

	case 5:
		require_once('../listagem/includes/estilo_5.php');
		break;

	default:
		require_once('../listagem/includes/estilo_1.php');
		break;
}
?>

<link rel="stylesheet" href="<?php echo RemoveHttpS(ConfigPainel('base_url')); ?>/epack/css/elements/animate.css">
