<?php
@session_start();
function isLoggedIn() {
    if (isset($_SESSION['userID'])) {
        return true;
    } else {
        return false;
    }
}

if (!isLoggedIn()) {
    header('Location: login.php');
    exit();
}
