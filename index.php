<?php
    session_start();
    if (!isset($_SESSION['userid'])) {
        if ($_SERVER['REQUEST_URI'] == '/moneylover/'
            or $_SERVER['REQUEST_URI'] == '/moneylover/index.php') {
            require_once 'src/Template/welcome.php';
        } else {
            require_once 'src/Template/page-not-found.php';
        }
    } else {
        $requestURI = explode('/', $_SERVER['REQUEST_URI']);
        $scriptName = explode('/', $_SERVER['SCRIPT_NAME']);

        if ($requestURI[2] == 'trang') {
            echo '<h1>Hello Trang!</h1>';
        } elseif ($requestURI[2] == 'luong') {
            echo '<h1 style="color:red; font-size: 100px;">Con do Luong!</h1>';
        } else {
            require_once 'src/Template/page-not-found.php';
        }
    }
