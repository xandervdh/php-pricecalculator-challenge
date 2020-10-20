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
            echo $groupId;
        } while($groupId != null);

    }
}