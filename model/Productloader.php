<?php

class Productloader
{
    private array $products = [];
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $result = $this->pdo->query("SELECT name, price, category FROM product");//fetching data by query the selected columns
        foreach ($result as $row) {
            //pushes the productname, price and category in the array
            array_push($this->products, new Product($row['name'], intval($row['price']),  $row['category']));
        }

    }

    // get acces to the private products array
    public function getProducts(): array
    {
        return $this->products;
    }

}
