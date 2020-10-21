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
        return $this->pdo->query('SELECT firstname, lastname, group_id, variable_discount, fixed_discount FROM customer ORDER BY lastname');


    }



    public function getCustomers(): array
    {
        return $this->customers;
    }


}


