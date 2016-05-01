<?php
    require_once 'src/Controller/FrontController.php';

    $fController = new FrontController(
                            $_SERVER['REQUEST_URI'],
                            $_SERVER['SCRIPT_NAME'],
                            $_POST,
                            $_GET
                        );

    $fController->proc();
