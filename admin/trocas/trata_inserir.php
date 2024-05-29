<?php
include '../../include/config.inc.php';
include $arrConfig['dir_site'] . '/include/auth.inc.php';
include 'dados.inc.php';

print_r($_POST);
print_r($_FILES);

// Obter codSocio1 e codSocio2 do POST
$codSocio1 = isset($_POST['codSocio1']) ? my_real_escape_string($_POST['codSocio1']) : null;
$codSocio2 = isset($_POST['codSocio2']) ? my_real_escape_string($_POST['codSocio2']) : null;

if ($codSocio1 && $codSocio2) {
  // Obter os detalhes dos lugares anuais correspondentes aos sócios
  $querySocio1 = "SELECT * FROM lugar_anual WHERE codSocio1 = '$codSocio1'";
  $resultSocio1 = my_query($querySocio1);

  $querySocio2 = "SELECT * FROM lugar_anual WHERE codSocio1 = '$codSocio2'";
  $resultSocio2 = my_query($querySocio2);

  if ($resultSocio1 && $resultSocio2) {
    $lugarSocio1 = $resultSocio1[0];
    $lugarSocio2 = $resultSocio2[0];

    // Trocar os codSocio1 entre os dois registros
    $queryUpdateSocio1 = "UPDATE lugar_anual SET codSocio1 = '$codSocio2' WHERE codLugarAnual = '{$lugarSocio1['codLugarAnual']}'";
    $resultUpdateSocio1 = my_query($queryUpdateSocio1);
    if (!$arrConfig['production'] && !$resultUpdateSocio1) {
      die("ERRO: " . $queryUpdateSocio1);
    }

    $queryUpdateSocio2 = "UPDATE lugar_anual SET codSocio1 = '$codSocio1' WHERE codLugarAnual = '{$lugarSocio2['codLugarAnual']}'";
    $resultUpdateSocio2 = my_query($queryUpdateSocio2);
    if (!$arrConfig['production'] && !$resultUpdateSocio2) {
      die("ERRO: " . $queryUpdateSocio2);
    }

    // Inserir a troca na tabela trocas
    $queryTroca = "INSERT INTO trocas (codSocio1, codSocio2, codLugar1, codLugar2) VALUES ('$codSocio1', '$codSocio2', '{$lugarSocio1['codLugarAnual']}', '{$lugarSocio2['codLugarAnual']}')";
    $resultTroca = my_query($queryTroca);
    if (!$arrConfig['production'] && !$resultTroca) {
      die("ERRO: " . $queryTroca);
    }
  } else {
    die("ERRO: Não foi possível encontrar os lugares anuais para os sócios fornecidos.");
  }
}

header('Location: ' . $arrConfig['url_admin'] . '/' . $modulo . '/');
exit;
?>