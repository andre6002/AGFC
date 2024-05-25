<?php
include '../include/config.inc.php';

$usr = $_POST['usr'];
$pwd = $_POST['pwd'];
//echo password_hash($_POST['pwd'], PASSWORD_DEFAULT);

$query = "SELECT * FROM admins WHERE username = '$usr' AND ativo = '1'";
$arrResultados = my_query($query);

// se existir o username, vamos ver se a password é válida
if (count($arrResultados) > 0) {
    $password_hash = $arrResultados[0]['password'];
    if (password_verify($pwd, $password_hash)) {
        // admin autorizado
        $_SESSION['login'] = 1;
        $_SESSION['userID'] = $arrResultados[0]['id'];
        $_SESSION['userName'] = $arrResultados[0]['username'];

        header('Location: ' . $arrConfig['url_admin']);
        exit();
    }
}
header('Location: ' . $arrConfig['url_admin'] . '/login.php?erro=1');
exit();