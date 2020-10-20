<?php
//require 'Client.php';

class Customers
{
    private $pdo;
    /* @var Customer[]*/
    private array $customers = [];

    public function __construct ($pdo)
    {
        $this->pdo = $pdo;
        //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $handle = $pdo->prepare("SELECT id, firstname, lastname FROM customer");
        $handle->execute();
        $users = $handle->fetchAll();
        var_dump($users);
        $customerCount = count($this->customers);
        $getAllCustomers = $this->getAllCustomers();
        foreach ($getAllCustomers as $row){
            array_push($this->customers, new Client($row['firstname'], $row['lastname']));
        }

var_dump($this->customers);

       // array_push($this->customers, new Customer($this->firstname,$this->lastname));

    }

    function getAllCustomers() {
        return $this->pdo->query('SELECT * FROM customer');


    }

    /**
     * @return Customer[]
     */
    public function getCustomers(): array
    {
        return $this->customers;
    }


}


