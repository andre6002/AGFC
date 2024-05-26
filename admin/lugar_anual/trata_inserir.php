<?php
include '../../include/config.inc.php';
include $arrConfig['dir_site'] . '/include/auth.inc.php';
include 'dados.inc.php';

print_r($_POST);
print_r($_FILES);

// -------------------------------------------
// (1) Construir strings com as informações dos Campos
// -------------------------------------------
$strCampos = '';
$strValores = '';
foreach ($arrCampos as $kCampos => $vCampos) {
  if (isset($vCampos['inserir'])) {
    if ($vCampos['inserir']) {
      if ($vCampos['tipo'] == 'checkbox') {
        $strCampos .= $kCampos . ', ';
        $estado = (isset($_POST[$kCampos]) ? 1 : 0);
        $strValores .= "'$estado', ";
      } else if ($vCampos['tipo'] == 'file') {
        if (isset($_FILES[$kCampos])) {
          $arquivo = $_FILES[$kCampos];
          if ($arquivo['error'] == UPLOAD_ERR_OK) {
            $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
            $nome = md5($arquivo['name'] . time()) . '.' . $extensao;
            move_uploaded_file($arquivo['tmp_name'], $arrConfig['dir_site'] . '/uploads/' . $nome);
            $strCampos .= $kCampos . ', ';
            $strValores .= "'$nome', ";
          }
        }
      } else {  
        $strCampos .= $kCampos . ', ';
        $strValores .= "'$_POST[$kCampos]', ";
      }
    }
  }
}
$strCampos = substr($strCampos, 0, strlen($strCampos) - 2);
$strValores = substr($strValores, 0, strlen($strValores) - 2);
// -------------------------------------------
// (1) fim
// -------------------------------------------


// Query
$query = "INSERT INTO $modulo ($strCampos) VALUES ($strValores)";
$result = my_query($query);
if (!$arrConfig['production'] && !$result)
  die("ERRO: " . $query);

header('Location: ' . $arrConfig['url_admin'] . '/' . $modulo . '/');
exit;