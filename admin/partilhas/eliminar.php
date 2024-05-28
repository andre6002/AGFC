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

// Obter o codLugarAnual correspondente ao codSocio1
$query_select = "SELECT codLugarAnual FROM partilhas WHERE $strCamposChave";
$result_select = my_query($query_select);
if (!$arrConfig['production'] && !$result_select)
  die("ERRO: " . $query_select);

$codLugarAnual = $result_select[0]['codLugarAnual'];

// Atualizar a tabela lugar_anual para remover o codSocio2
$query_update = "UPDATE lugar_anual SET codSocio2 = NULL WHERE codLugarAnual = '$codLugarAnual'";
$result_update = my_query($query_update);
if (!$arrConfig['production'] && !$result_update)
  die("ERRO: " . $query_update);

// Query para deletar a entrada da tabela partilhas
$query_delete = "DELETE FROM $modulo WHERE $strCamposChave";
$result_delete = my_query($query_delete);
if (!$arrConfig['production'] && !$result_delete)
  die("ERRO: " . $query_delete);

header('Location: ' . $arrConfig['url_admin'] . '/' . $modulo . '/');
exit;
?>