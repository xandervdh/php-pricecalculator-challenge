<?php

class Customers
{
    private PDO $pdo;
    private array $customers = [];

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        // line 5, create PDO variable to use. access data from databasa by query selecting needed data. (we used * in the beginning to select everything)
        $getAllCustomers = $this->pdo->query('SELECT firstname, lastname, group_id, variable_discount, fixed_discount FROM customer ORDER BY lastname');
        // Loop through each row and push data in array that we created. (line 6)
        foreach ($getAllCustomers as $row) {

            array_push($this->customers, new Client($row['firstname'], $row['lastname'], $row['group_id'], $pdo, $row['fixed_discount'], $row['variable_discount']));

        }

    }
// in orde' to access from another file, we need to create a getter which will return what we can use to bypass private.
    public function getCustomers(): array
    {
        return $this->customers;
    }

}



