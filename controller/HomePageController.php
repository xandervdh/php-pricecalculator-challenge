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
        session_start(); //start session
        $pdo = openDB(); //get database connection
        $customerObj = new Customers($pdo); //make new customers opbject
        $clients = $customerObj->getCustomers(); //get the array of customers

        $products = new Productloader($pdo); //make new productloader object
        $productsArray = $products->getProducts(); //get the array of products

        $categories = [];
        foreach ($productsArray as $product) {
            //if the category is not in the categories array push it
            if (!in_array($product->getCategory(), $categories)) {
                array_push($categories, $product->getCategory());
            }
        }
        if (!isset($_POST['category'])){
            $_POST['category'] = 'all';
        }

        $message = "";
        //if there is a POST request and selectedProduct is not empty
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //if the session exist fill post category with the session category
            if (isset($_SESSION['category'])){
                $_POST['category'] = $_SESSION['category'];
            } else { //else fill the session category with the post category
                $_SESSION['category'] = $_POST['category'];
            }
            //if quantity is not selected
            if (isset($_POST['quantity'])) {
                if ($_POST['quantity'] == 'empty') {
                    //change message
                    $message = '<div class="alert alert-danger" role="alert"> Please choose a quantity! </div>';
                } else {
                    session_destroy(); //if a purchase was made unset the session
                    $_POST['category'] = 'all'; //and make the post category all
                    //set the succes message
                    $message = '<div class="alert alert-success" role="alert"> Thank you for your purchase. </div>';
                    //make a new calculate object
                    $calculate = new Calculate($pdo, $products, $_POST['selectedProduct'], $customerObj, $_GET['client'], intval($_POST['quantity']));
                    $total = $calculate->calculateDiscount(); //get the price minus discounts
                    $calculation = $calculate->getCalculation(); //get the calculation process
                }
            }
        }
        require 'view/homepage.php';
    }
}
