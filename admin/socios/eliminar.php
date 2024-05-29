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

// Obter o codSocio a partir das chaves
$codSocio = $_GET['codSocio'];

// Atualizar registros na tabela lugar_anual para definir codSocio2 como NULL
$queryUpdateLugarAnual = "UPDATE lugar_anual SET codSocio2 = NULL WHERE codSocio2 = '$codSocio'";
$resultUpdateLugarAnual = my_query($queryUpdateLugarAnual);
if (!$resultUpdateLugarAnual) {
  die("ERRO: " . $queryUpdateLugarAnual);
}

// Atualizar registros na tabela partilhas onde o sócio é codSocio2 para definir codSocio2 como NULL
$queryUpdatePartilhas = "DELETE FROM partilhas WHERE codSocio2 = '$codSocio'";
$resultUpdatePartilhas = my_query($queryUpdatePartilhas);
if (!$resultUpdatePartilhas) {
  die("ERRO: " . $queryUpdatePartilhas);
}

// Remover registros nas tabelas lugar_anual, partilhas e trocas onde o sócio é codSocio1
$queryPartilhas = "DELETE FROM partilhas WHERE codSocio1 = '$codSocio'";
$resultPartilhas = my_query($queryPartilhas);
if (!$resultPartilhas) {
  die("ERRO: " . $queryPartilhas);
}

$queryTrocas = "DELETE FROM trocas WHERE codSocio1 = '$codSocio'";
$resultTrocas = my_query($queryTrocas);
if (!$resultTrocas) {
  die("ERRO: " . $queryTrocas);
}

$queryTrocasCodLugar1 = "DELETE FROM trocas WHERE codLugar1 IN (SELECT codLugarAnual FROM lugar_anual WHERE codSocio1 = '$codSocio')";
$resultTrocasCodLugar1 = my_query($queryTrocasCodLugar1);
if (!$resultTrocasCodLugar1) {
  die("ERRO: " . $queryTrocasCodLugar1);
}

$queryTrocasCodLugar2 = "DELETE FROM trocas WHERE codLugar2 IN (SELECT codLugarAnual FROM lugar_anual WHERE codSocio1 = '$codSocio')";
$resultTrocasCodLugar2 = my_query($queryTrocasCodLugar2);
if (!$resultTrocasCodLugar2) {
  die("ERRO: " . $queryTrocasCodLugar2);
}

$queryLugarAnual = "DELETE FROM lugar_anual WHERE codSocio1 = '$codSocio'";
$resultLugarAnual = my_query($queryLugarAnual);
if (!$resultLugarAnual) {
  die("ERRO: " . $queryLugarAnual);
}

// Remover o sócio da tabela principal
$query = "DELETE FROM socios WHERE codSocio = '$codSocio'";
$result = my_query($query);
if (!$result) {
  die("ERRO: " . $query);
}

header('Location: ' . $arrConfig['url_admin'] . '/' . $modulo . '/');
exit;
?>