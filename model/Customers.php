<?php
//require 'Client.php';

class Customers
{
    private $pdo;
    private array $customers = [];
    private array $customerGroups = [];

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

  /* public function getGroups()
    {
        $groupId = $customer['group_id'];

        do{
            $handler = $this->pdo->prepare('SELECT * FROM customer_group WHERE id = :id');
            $handler->bindValue(':id', $groupId);
            $handler->execute();
            $customerGroup = $handler->fetch();
            array_push($this->customerGroups, $customerGroup);

            $groupId = $customerGroup['parent_id'];
        } while($groupId != null);

    }
  */

    public function getCustomers(): array
    {
        return $this->customers;
    }


}


