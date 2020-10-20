<?php
//require 'Client.php';

class Customers
{
    private $pdo;
    private array $customers;

    public function __construct ($pdo)
    {
        $this->pdo = $pdo;
        //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $handle = $pdo->prepare("SELECT id, firstname, lastname FROM customer");
        $handle->execute();
        $users = $handle->fetchAll();
        var_dump($users);
    }


}


