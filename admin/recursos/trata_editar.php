<?php
include '../../include/config.inc.php';
include $arrConfig['dir_site'] . '/include/auth.inc.php';
include 'dados.inc.php';
 
// Iniciar o buffer de saída
ob_start();
 
// (1) obter informações dos campos Chave
$arrCamposChave = array();
foreach ($arrCampos as $kCampos => $vCampos) {
  if (isset($vCampos['chave']) && $vCampos['chave']) {
    $valor = $_POST[$kCampos] ?? '';
    $arrCamposChave[] = array('nome' => $kCampos, 'valor' => $valor);
  }
}
 
$strCamposChave = '';
foreach ($arrCamposChave as $k => $v) {
  $strCamposChave .= "$v[nome] = '$v[valor]' AND ";
}
$strCamposChave = substr($strCamposChave, 0, -5);
 
// (2) Construir strings com as informações dos Campos
$strCamposValores = '';
foreach ($arrCampos as $kCampos => $vCampos) {
  if (isset($vCampos['editar']) && $vCampos['editar']) {
    $valor = $_POST[$kCampos] ?? '';
    if ($vCampos['tipo'] == 'checkbox') {
      $estado = isset($_POST[$kCampos]) ? 1 : 0;
      $strCamposValores .= "$kCampos = '$estado', ";
    } else if ($vCampos['tipo'] == 'file') {
      if (isset($_FILES[$kCampos])) {
        $arquivo = $_FILES[$kCampos];
        if ($arquivo['error'] == UPLOAD_ERR_OK) {
          $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
          $nome = md5($arquivo['name'] . time()) . '.' . $extensao;
          move_uploaded_file($arquivo['tmp_name'], $arrConfig['dir_site'] . '/uploads/' . $nome);
          $strCamposValores .= "$kCampos = '$nome', ";
        }
      } else {
        $strCamposValores .= "$kCampos = '$valor', ";
      }
    } else {
      $valorEscapado = my_real_escape_string($valor);
      $strCamposValores .= "$kCampos = '$valorEscapado', ";
    }
  }
}
$strCamposValores = substr($strCamposValores, 0, -2);
 
// Query
$query = "UPDATE $modulo SET $strCamposValores WHERE $strCamposChave";
$result = my_query($query);
 
if (isset($arrConfig['production']) && !$arrConfig['production'] && !$result) {
  die("ERRO: " . $query); 
}
 
ob_end_clean();
 
header('Location: ' . $arrConfig['url_admin'] . '/' . $modulo . '/');
exit;