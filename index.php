<?php
declare(strict_types=1);

if (isset($_GET['client'])){
    require 'controller/HomePageController.php';
    $controller = new HomepageController();
} else {
    require 'controller/LoginController.php';
    $controller = new LoginController();
}

$controller->render();