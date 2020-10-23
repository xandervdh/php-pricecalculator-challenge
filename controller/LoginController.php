<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'model/Customers.php';
require 'model/Client.php';
require 'config.php';

class LoginController
{
    public function render()
    {
        $pdo = openDB();// make the connection to access the database
        $customerObj = new Customers($pdo);
        $clients = $customerObj->getCustomers();

        require 'view/login.php';
    }
}