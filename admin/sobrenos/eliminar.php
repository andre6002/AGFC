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
        $arrCamposChave[]= array('nome' => $kCampos, 'valor' => $_GET[$kCampos]);
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


// Query
$query = "DELETE FROM $modulo WHERE $strCamposChave";
$result = my_query($query);
if(!$arrConfig['production'] && !$result) die("ERRO: ".$query);

header('Location: '.$arrConfig['url_admin'].'/'.$modulo.'/');
exit;
