<?php
include '../../include/config.inc.php';
include $arrConfig['dir_site'] . '/include/auth.inc.php';
include 'dados.inc.php';

// Verificar se o ID do socio já existe na tabela de stocks
if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $verificaQuery = "SELECT * FROM stocks WHERE id = '$id'";
  // my_query() precisa retornar um objeto mysqli_result
  $verificaResult = my_query($verificaQuery);

  // Se my_query() já está tratando o resultado e retornando um array, você não pode usar mysqli_num_rows() diretamente.
  // Precisa verificar se o array está vazio ou não.
  if(count($verificaResult) > 0) {
      // Redirecionar de volta para a página de inserção com uma mensagem de erro
      $_SESSION['mensagem_erro'] = 'Este socio já possui stock inserido.';
      header('Location: inserir.php');
      exit;
  }
}
// -------------------------------------------
// (1) Construir strings com as informações dos Campos
// -------------------------------------------
$strCampos = '';
$strValores = '';
foreach($arrCampos as $kCampos => $vCampos) {
  if(isset($vCampos['inserir'])) {
    if($vCampos['inserir']) {
      if($vCampos['tipo'] == 'checkbox') {
        // Tratar excepções dos campos (checkbox)
        $strCampos .= $kCampos . ', ';
        $estado = ( isset($_POST[$kCampos]) ? 1 : 0 );
        $strValores .= "'$estado', ";
      } else {
        // Campos genéricos
        $strCampos .= $kCampos . ', ';
        $strValores .= "'$_POST[$kCampos]', ";
      }
    }
  }
}
$strCampos = substr($strCampos, 0, strlen($strCampos)-2);
$strValores = substr($strValores, 0, strlen($strValores)-2);
// -------------------------------------------
// (1) fim
// -------------------------------------------


// Query
$query = "INSERT INTO $modulo ($strCampos) VALUES ($strValores)";
$result = my_query($query);
if(!$arrConfig['production'] && !$result) die("ERRO: ".$query);

header('Location: '.$arrConfig['url_admin'].'/'.$modulo.'/');
exit;