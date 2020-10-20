<?php
header('Access-Control-Allow-Origin: *');
require_once('../../../includes/funcoes.php');
require_once('../../../database/config.database.php');
require_once('../../../database/config.php');

// Pegar listagem
$id 		= get('id');
$uniqid = uniqid();

if (ModoManutencao()) { header("Location: ../manutencao.php"); }

// Pega configuração
$query = DBRead('imobiliaria_config','*');

$config = [];
foreach ($query as $key => $row) {
  $config[$row['id']] = $row['valor'];
}

// Pegar lista de ID relacionado ao imovel
// Buscando imoveis relacionados ao imovel
$lista_ids_prod_relacionados = DBRead('imobiliaria_imov_relacionados', 'id_imovel_relacionado', "WHERE id_imovel = {$id}");

// Varre todos os ID de categoria da lista, cria uma array, e transforma logo em seguida em uma string
$ids_prod_relacionados = array();
if(is_array($lista_ids_prod_relacionados)){
  foreach ($lista_ids_prod_relacionados as $linha) {
    array_push($ids_prod_relacionados, $linha['id_imovel_relacionado']);
  }
  $ids_prod_relacionados = implode(",", $ids_prod_relacionados);
}
else{
  $ids_prod_relacionados = "";
}


if(!$ids_prod_relacionados){
	$imoveis = array();
}
else{
	$imoveis   = DBRead(
		'imobiliaria',
		'imobiliaria.*, imobiliaria_imov_imagens.uniq as id_foto_capa',
		"INNER JOIN imobiliaria_imov_imagens ON imobiliaria.id_imagem_capa = imobiliaria_imov_imagens.id
		WHERE imobiliaria.id IN ($ids_prod_relacionados)"
	);
}

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
