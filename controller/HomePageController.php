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

        $success = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if ($_POST['client'] != 'empty' && $_POST['product'] != 'empty'){
                $success = '<div class="alert alert-success" role="alert"> Price calculated </div>';
            }
        }
        require 'view/homepage.php';
    }
}