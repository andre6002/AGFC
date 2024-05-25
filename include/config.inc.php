<?php
@session_start();
global $arrConfig;

if (isset($_COOKIE["lang"])) {
    if (!isset($_SESSION["lang"])) {
        $_SESSION["lang"] = $_COOKIE["lang"];
    }
}
if (!isset($_SESSION["lang"])) {
    $_SESSION["lang"] = "pt";
    setcookie("lang", "pt", time()+86400*100, "/");
}

$arrConfig['langs'] = Array('pt' => 'Português', 'en' => 'English');

$arrConfig['servername'] = 'localhost';
$arrConfig['username'] = 'root';
$arrConfig['password'] = '';
$arrConfig['dbname'] = 'agfc';


$arrConfig['url_site']='http://localhost/agfc/';
$arrConfig['dir_site']='C:/wamp64/www/agfc';
$arrConfig['url_admin']= $arrConfig['url_site'] . "/admin";
$arrConfig['dir_admin']=$arrConfig['dir_site'].'/admin';

function get_user_ip_address()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function add_log($modulo = null, $acao = null, $pagina = null)
{
    $modulo = $modulo ? $modulo : explode('/', $_SERVER['REQUEST_URI'])[count(explode('/', $_SERVER['REQUEST_URI'])) - 1];
    $acao = $acao ? $acao : $_SERVER['REQUEST_METHOD'];
    $pagina = $pagina ? $pagina : $_SERVER['REQUEST_URI'];
    $user = isset ($_SESSION['id']) ? $_SESSION['id'] : 0;
    $ip = get_user_ip_address();
    $sessao = session_id();
    $data = date('Y-m-d H:i:s');

    $q = "INSERT INTO logs (pagina, modulo, acao, id_utilizador, endereco_ip, id_sessao, data) VALUES ('$pagina', '$modulo', '$acao', $user, '$ip', '$sessao', '$data')";
    my_query($q);
}

include 'db.inc.php';