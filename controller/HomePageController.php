<?php
declare(strict_types = 1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'model/Customers.php';
require 'model/Client.php';
require 'model/Product.php';
require 'model/Productloader.php';
require 'config.php';

class HomepageController
{
    public function render()
    {
        $pdo = openDB();
        $customers = new Customers($pdo);
        $clients = $customers->getCustomers();

        $products = new Productloader($pdo);
        $productsArray = $products->getProducts();

        require 'view/homepage.php';
    }
}