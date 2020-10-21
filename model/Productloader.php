<?php


class Productloader
{
    private array $products = [];
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $result = $this->pdo->query("SELECT name, price FROM product");
        foreach ($result as $row) {
            array_push($this->products, new Product($row['name'], intval($row['price'])));
        }

    }

    public function getProducts(): array
    {
        return $this->products;
    }
}
