<?php
declare(strict_types=1);


class Client
{
    private string $firstName;
    private string $lastName;
    private int $groupId;
    private PDO $pdo;
    private $fixedDiscounts;
    private $varDiscount;
    private array $customerGroups = [];

    public function __construct(string $firstName, string $lastName, int $groupId, PDO $pdo, $fixedDiscounts, $varDiscounts)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->groupId = $groupId;
        $this->pdo = $pdo;
        $this->fixedDiscounts = $fixedDiscounts;
        $this->varDiscount = $varDiscounts;
        $this->getGroups();
    }

    public function getGroups(): void
    {
        $groupId = $this->groupId;

        do {
            $handler = $this->pdo->prepare('SELECT * FROM customer_group WHERE id = :id');
            $handler->bindValue(':id', $groupId);
            $handler->execute();
            $customerGroup = $handler->fetch();
            array_push($this->customerGroups, $customerGroup);

            $groupId = $customerGroup['parent_id'];
        } while ($groupId != null);
    }


    public function getFirstName(): string
    {
        return $this->firstName;
    }


    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getCustomerGroups(): array
    {
        return $this->customerGroups;
    }

    public function getFixedDiscounts()
    {
        return $this->fixedDiscounts;
    }

    public function getVarDiscount()
    {
        return $this->varDiscount;
    }
}
