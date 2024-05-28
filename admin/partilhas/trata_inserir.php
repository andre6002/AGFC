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
  // Atualizar a tabela lugar_anual para adicionar codSocio2
  $query = "UPDATE lugar_anual SET codSocio2 = '$codSocio2' WHERE codSocio1 = '$codSocio1'";
  $result = my_query($query);
  if (!$arrConfig['production'] && !$result) {
    die("ERRO: " . $query);
  }

  // Obter codLugarAnual correspondente ao codSocio1
  $queryLugarAnual = "SELECT codLugarAnual FROM lugar_anual WHERE codSocio1 = '$codSocio1'";
  $resultLugarAnual = my_query($queryLugarAnual);
  if (!$resultLugarAnual || count($resultLugarAnual) == 0) {
    die("ERRO: Não foi possível encontrar codLugarAnual para o codSocio1 fornecido.");
  }
  $codLugarAnual = $resultLugarAnual[0]['codLugarAnual'];

  // Inserir na tabela partilhas
  $queryPartilha = "INSERT INTO partilhas (codLugarAnual, codSocio1, codSocio2) VALUES ('$codLugarAnual', '$codSocio1', '$codSocio2')";
  $resultPartilha = my_query($queryPartilha);
  if (!$arrConfig['production'] && !$resultPartilha) {
    die("ERRO: " . $queryPartilha);
  }
}

header('Location: ' . $arrConfig['url_admin'] . '/' . $modulo . '/');
exit;
