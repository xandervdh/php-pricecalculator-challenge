<?php


class Productloader
{
    private array $products;
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $result = $this->LoadAllProducts();
        foreach ($result as $row) {
            $divideBy = $row['price'] / 100;
            array_push($this->products, new Product($row['name'], $divideBy));
        }

    }


    public function getProducts(): array
    {
        return $this->products;
    }


    public function LoadAllProducts()
    {
        return $this->pdo->query("SELECT * FROM product");


    }
}

// new product gaat loop worden die gaat vragen naar naam en prijs van de database
