<?php


class Productloader
{
    private array $products = [];
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $result = $this->LoadAllProducts();
        foreach ($result as $row) {
            $divideBy = $row['price'];
            array_push($this->products, new Product($row['name'], $divideBy));
        }

    }


    public function getProducts(): array
    {
        return $this->products;
    }


    public function LoadAllProducts()
    {
        return $this->pdo->query("SELECT name, price FROM product");//* is alles selecteren van database, veranderen in wat nodig is


    }
}
