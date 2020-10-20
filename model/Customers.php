<?php
//require 'Client.php';

class Customers
{
    private $pdo;
    /**@var customer[] */
    private array $customers = [];

    public function __construct ($pdo)
    {
        $this->pdo = $pdo;
        //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $handle = $pdo->prepare("SELECT id, firstname, lastname FROM customer");
        $handle->execute();
        $users = $handle->fetchAll();
        var_dump($users);


    //   array_push($this->customers, new Client($firstName,$lastName));

        /*
         if (count($customers) > 20) {
            array_shift($this->posts);
        }
        */
    }

    function getAllCustomers($pdo) {
        return $pdo->query('SELECT * FROM customer');

    }


}


