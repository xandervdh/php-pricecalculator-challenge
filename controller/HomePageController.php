<?php
declare(strict_types = 1);
require 'model/Customers.php';
require 'config.php';

class HomepageController
{
    public function render()
    {
        $pdo = openDB();
        $customers = new Customers($pdo);
        $clients = $customers->getCustomers;

        require 'view/homepage.php';
    }
}