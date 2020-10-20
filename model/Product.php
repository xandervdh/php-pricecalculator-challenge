<?php
declare(strict_types=1);


class Product
{
    private string $productname;
    private int $productprice;

    public function __construct($productname, $productprice)
    {
        $this->productname = $productname;
        $this->productprice = $productprice;

    }

    public function getProductname(): string //to get the private properties
    {
        return $this->productname;
    }

    /**
     * @return int
     */
    public function getProductprice(): int
    {
        return $this->productprice;
    }

}
// $p = new Product();
//echo $p->getProductname;
//echo $p->getProductprice;

//echo(round(0.70878, 2)); 2 digits after comma (echo $p->round(getProductprice, 2); !!!integer