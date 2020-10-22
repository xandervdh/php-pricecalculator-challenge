<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'model/Customers.php';
require 'model/Client.php';
require 'model/Product.php';
require 'model/Productloader.php';
require 'model/Calculate.php';
require 'config.php';

class HomepageController
{
    public function render()
    {
        $pdo = openDB();
        $customerObj = new Customers($pdo);
        $clients = $customerObj->getCustomers();

        $products = new Productloader($pdo);
        $productsArray = $products->getProducts();

        $categories = [];
        foreach ($productsArray as $product){
            if (!in_array($product->getCategory(), $categories)){
                array_push($categories, $product->getCategory());
            }
        }

        $success = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['selectedProduct'])) {
            if ($_POST['selectedProduct'] != 'empty') {
                $success = '<div class="alert alert-success" role="alert"> Price calculated </div>';

                $calculate = new Calculate($pdo, $products, $_POST['selectedProduct'], $customerObj, $_GET['client']);
                $total = $calculate->calculateDiscount();

            }
        }
        var_dump($_POST);
        require 'view/homepage.php';
    }
}