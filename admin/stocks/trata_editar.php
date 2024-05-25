<?php
include '../../include/config.inc.php';
include $arrConfig['dir_site'] . '/include/auth.inc.php';
include 'dados.inc.php';


// -------------------------------------------
// (1) obter informações dos campos Chave
// -------------------------------------------
$arrCamposChave = array();
foreach($arrCampos as $kCampos => $vCampos) {
  if(isset($vCampos['chave'])) {
    if($vCampos['chave']) {
        $arrCamposChave[]= array('nome' => $kCampos, 'valor' => $_POST[$kCampos]);
    }
  }
}
$strCamposChave = '';
foreach($arrCamposChave as $k => $v) {
  $strCamposChave .= "$v[nome] = '$v[valor]' AND ";
}
$strCamposChave = substr($strCamposChave, 0, strlen($strCamposChave)-5);
// -------------------------------------------
// (1) fim
// -------------------------------------------


// -------------------------------------------
// (2) Construir strings com as informações dos Campos
// -------------------------------------------
$strCamposValores = '';
foreach($arrCampos as $kCampos => $vCampos) {
  if(isset($vCampos['editar'])) {
    if($vCampos['editar']) {
      if($vCampos['tipo'] == 'checkbox') {
        // Tratar excepções dos campos (checkbox)
        $estado = ( isset($_POST[$kCampos]) ? 1 : 0 );
        $strCamposValores .= $kCampos . " = '$estado', ";
      } else {
        // Campos genéricos
        $strCamposValores .= $kCampos . " = '$_POST[$kCampos]', ";
      }
    }
  }
}
$strCamposValores = substr($strCamposValores, 0, strlen($strCamposValores)-2);
// -------------------------------------------
// (2) fim
// -------------------------------------------


// Query
$query = "UPDATE $modulo SET $strCamposValores WHERE $strCamposChave";
$result = my_query($query);
if(!$arrConfig['production'] && !$result) die("ERRO: ".$query);

header('Location: '.$arrConfig['url_admin'].'/'.$modulo.'/');
exit;