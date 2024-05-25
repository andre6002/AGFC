<?php
include '../include/config.inc.php';
session_destroy();

add_log('logout', 'logout-successful');

header('Location: '.$arrConfig['url_admin'] . '/login.php');
exit();
