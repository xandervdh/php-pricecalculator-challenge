<?php
declare(strict_types=1);

class Calculate
{
    private PDO $pdo;
    private Client $customer;
    private Product $product;
    private array $customerGroups;
    private float $discount;

    public function __construct(PDO $pdo, Productloader $product, string $productName, Customers $clients, string $client)
    {
        $this->pdo = $pdo;
        $products = $product->getProducts();
        foreach ($products as $product){
            if ($product->getProductname() === $productName){
                $this->product = $product;
            }
        }
        $customers = $clients->getCustomers();
        foreach ($customers as $customer){
            if ($customer->getLastName() === $client){
                $this->customer = $customer;
                $this->customerGroups = $this->customer->getCustomerGroups();
            }
        }
    }

    public function calcFixedDiscount()
    {
        $fixedDiscount = 0;
        foreach ($this->customerGroups as $group) {
            $fixedDiscount += $group['fixed_discount'];
        }
        return $fixedDiscount;
    }

    public function calcVariableDiscount()
    {
        $i = 0;
        $variabledisc = 0;
        do {
            if ($variabledisc <= $this->customerGroups[$i]['variable_discount']) {
                $variabledisc = $this->customerGroups[$i]['variable_discount'];
            }
            $i++;
        } while ($i < count($this->customerGroups));
        return $variabledisc;
    }

    public function discountComparison()
    {
        $price = $this->product->getProductprice();
        $fixedDisc = $this->calcFixedDiscount();
        $variabledisc = $this->calcVariableDiscount();
        $percentage = ($price / 100) * $variabledisc;
        $fixed = $fixedDisc * 100;
        $discount = [];

        if ($fixed < $percentage) {
            array_push($discount, $percentage, true);
        } else {
            array_push($discount, $fixed, false);
        }
        $this->discount = $discount[0];
        return $discount;
    }

    public function checkCustomerDiscount()
    {
        $bool = false;
        $discount = $this->discountComparison();
        if ($discount[1] == true && $this->customer->getVarDiscounts() != null) {
            $variableDisc = ($this->product->getProductprice() / 100) * $this->customer->getVarDiscounts();
            $bool = true;
            if ($discount[0] < $variableDisc) {
                $this->discount = $variableDisc;
            } else {
                $this->discount = $discount[0];
            }
        }
        array_push($discount, $bool);
        return $discount;
    }

    public function calculateDiscount()
    {
        $price = $this->product->getProductprice();
        $discount = $this->checkCustomerDiscount();
        if ($discount[2]){
            $total = $price - $this->discount;
        } elseif($discount[1] == true && $this->customer->getFixedDiscounts() != null) {
            $total = $price - $this->customer->getFixedDiscounts();
            $total -=  $this->discount;
        } elseif($discount[1] == false && $this->customer->getVarDiscounts() != null){
            $total = $price - $discount[0];
            $percentage = ($price / 100) * $this->customer->getVarDiscounts();
            $total -=  $percentage;
        } else{
            $total = $price - $discount[0];
            $total -= $this->customer->getFixedDiscounts();
        }
        if ($total < 0){
            $total = 0;
        }
        $total = $total/100;
        return $total;
    }
}