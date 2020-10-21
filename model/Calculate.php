<?php
declare(strict_types=1);

class Calculate
{
    private PDO $pdo;
    private int $customerId;
    private int $productId;
    private array $customer;
    private array $product;
    private array $customerGroups = [];
    private float $discount;

    public function __construct(int $customerId, int $productId, PDO $pdo)
    {
        $this->customerId = $customerId;
        $this->productId = $productId;
        $this->pdo = $pdo;

        $handler = $this->pdo->prepare('SELECT * FROM customer WHERE id = :id');
        $handler->bindValue(':id', $this->customerId);
        $handler->execute();
        $customer = $handler->fetch();
        $this->customer = $customer;

        $handler = $this->pdo->prepare('SELECT * FROM product WHERE id = :id');
        $handler->bindValue(':id', $this->productId);
        $handler->execute();
        $product = $handler->fetch();
        $this->product = $product;
        $this->getGroups();
    }

    public function getGroups()
    {
        $groupId = $this->customer['group_id'];

        do{
            $handler = $this->pdo->prepare('SELECT * FROM customer_group WHERE id = :id');
            $handler->bindValue(':id', $groupId);
            $handler->execute();
            $customerGroup = $handler->fetch();
            array_push($this->customerGroups, $customerGroup);

            $groupId = $customerGroup['parent_id'];
        } while($groupId != null);

    }

    public function calcFixedDiscount()
    {
        $fixedDiscount = 0;
        foreach ($this->customerGroups as $group){
            $fixedDiscount += $group['fixed_discount'];
        }
        return $fixedDiscount;
    }

    public function calcVariableDiscount()
    {
        $i = 0;
        $variabledisc = 0;
        do {
            if ($variabledisc <= $this->customerGroups[$i]['variable_discount']){
                $variabledisc = $this->customerGroups[$i]['variable_discount'];
            }
            $i++;
        } while($i < count($this->customerGroups));
        return $variabledisc;
    }

    public function discountComparison()
    {
        $price = $this->product['price'] / 100;
        $fixedDisc = $this->calcFixedDiscount();
        $variabledisc = $this->calcVariableDiscount();
        $percentage = ($price / 100) * $variabledisc;
        $discount = [];

        if ($price - $fixedDisc < $price - $percentage ){
            array_push($discount, $percentage, 'variable');
        } else {
            array_push($discount, $fixedDisc, 'fixed');
        }
        return $discount;
    }

    public function checkCustomerDiscount()
    {
        $discount = $this->discountComparison();
        if ($discount[1] == 'variable'){
            if ($this->customer['variable_discount'] != null){
                if ($discount[0] < $this->customer['variable_discount']){
                    $this->discount = $this->customer['variable_discount'];
                } else {
                    $this->discount = $discount[0];
                }
            }
        }
    }
}