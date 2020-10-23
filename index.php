<?php
declare(strict_types=1);

//if you choose a client show the homepage
if (isset($_GET['client'])){
    require 'controller/HomePageController.php';
    $controller = new HomepageController();
} else { //else show the login page
    require 'controller/LoginController.php';
    $controller = new LoginController();
}
//render the view
$controller->render();