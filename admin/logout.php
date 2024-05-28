<?php
include '../include/config.inc.php';
session_destroy();

header('Location: ' . $arrConfig['url_admin'] . '/login.php');
exit();
