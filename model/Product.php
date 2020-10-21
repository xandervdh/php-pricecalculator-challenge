<?php
declare(strict_types=1);


class Product
{
    private string $productname;
    private int $productprice;

    public function __construct(string $productname, int $productprice)
    {
        $this->productname = $productname;
        $this->productprice = $productprice;
    }

    public function getProductname(): string
    {
        return $this->productname;
    }

    public function getProductprice(): int
    {
        return $this->productprice;
    }
}


