<?php

class Customers
{
    private PDO $pdo;
    private array $customers = [];

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $getAllCustomers = $this->pdo->query('SELECT firstname, lastname, group_id, variable_discount, fixed_discount FROM customer ORDER BY lastname');
        foreach ($getAllCustomers as $row) {

            array_push($this->customers, new Client($row['firstname'], $row['lastname'], $row['group_id'], $pdo, $row['fixed_discount'], $row['variable_discount']));

        }

    }

    public function getCustomers(): array
    {
        return $this->customers;
    }

}


