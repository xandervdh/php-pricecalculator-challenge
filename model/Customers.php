<?php
//require 'Client.php';

class Customers
{
    private $pdo;
    private array $customers = [];

    public function __construct ($pdo)
    {
        $this->pdo = $pdo;
        $getAllCustomers = $this->getAllCustomers();
        foreach ($getAllCustomers as $row){
            array_push($this->customers, new Client($row['firstname'], $row['lastname']));
        }


    }

    function getAllCustomers() {
        //INSTEAD OF * DEFINE FIRSTNAME, LASTNAME, GROUP ID, FIXED DISCOUNTS, VAR DISCOUNTS
        return $this->pdo->query('SELECT * FROM customer');


    }

    public function getCustomers(): array
    {
        return $this->customers;
    }


}


