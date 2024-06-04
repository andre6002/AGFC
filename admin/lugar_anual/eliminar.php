<?php
include '../../include/config.inc.php';
include $arrConfig['dir_site'] . '/include/auth.inc.php';
include 'dados.inc.php';

// -------------------------------------------
// (1) obter informações dos campos Chave
// -------------------------------------------
$arrCamposChave = array();
foreach ($arrCampos as $kCampos => $vCampos) {
  if (isset($vCampos['chave'])) {
    if ($vCampos['chave']) {
      $arrCamposChave[] = array('nome' => $kCampos, 'valor' => $_GET[$kCampos]);
    }
  }
}
$strCamposChave = '';
foreach ($arrCamposChave as $k => $v) {
  $strCamposChave .= "$v[nome] = '$v[valor]' AND ";
}
$strCamposChave = substr($strCamposChave, 0, strlen($strCamposChave) - 5);
// -------------------------------------------
// (1) fim
// -------------------------------------------

// Obter o codLugarAnual antes de deletar
$queryGetLugar = "SELECT codLugarAnual FROM $modulo WHERE $strCamposChave";
$resultLugar = my_query($queryGetLugar);
if (!$resultLugar) {
  die("ERRO: " . $queryGetLugar);
}
$codLugarAnual = $resultLugar[0]['codLugarAnual'];

// Remover a partilha associada
$queryDeletePartilha = "DELETE FROM partilhas WHERE codLugarAnual = '$codLugarAnual'";
$resultPartilha = my_query($queryDeletePartilha);
if (!$arrConfig['production'] && !$resultPartilha)
  die("ERRO: " . $queryDeletePartilha);

$queryDeleteTroca = "DELETE FROM trocas WHERE codLugar1 = '$codLugarAnual' OR codLugar2 = '$codLugarAnual'";
$resultTroca = my_query($queryDeleteTroca);
if (!$arrConfig['production'] && !$resultTroca)
  die("ERRO: " . $queryDeleteTroca);

// Remover o codSocio2 da tabela lugar_anual
$queryUpdateLugarAnual = "UPDATE lugar_anual SET codSocio2 = NULL WHERE codLugarAnual = '$codLugarAnual'";
$resultUpdateLugarAnual = my_query($queryUpdateLugarAnual);
if (!$arrConfig['production'] && !$resultUpdateLugarAnual)
  die("ERRO: " . $queryUpdateLugarAnual);

// Remover o lugar anual
$query = "DELETE FROM $modulo WHERE $strCamposChave";
$result = my_query($query);
if (!$arrConfig['production'] && !$result)
  die("ERRO: " . $query);

header('Location: ' . $arrConfig['url_admin'] . '/' . $modulo . '/');
exit;
?>