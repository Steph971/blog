<?php

use App\Controller\FrontController;
//require_once '../src/controller/FrontController.php';
require_once '../vendor/autoload.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$frontController = new FrontController();
// print_r($_SESSION);
// var_dump($frontController);
$frontController->run();
