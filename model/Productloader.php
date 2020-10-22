<?php

class Productloader
{
    private array $products = [];
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $result = $this->pdo->query("SELECT name, price, category FROM product");//fetching data by query
        foreach ($result as $row) {
            //pushes the productname and price in the array
            array_push($this->products, new Product($row['name'], intval($row['price'], $row['category'])));
        }

    }

    // get the private products array
    public function getProducts(): array
    {
        return $this->products;
    }

}
