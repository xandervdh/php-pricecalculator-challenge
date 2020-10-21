<?php
declare(strict_types=1);


class Client
{
    private $firstName;
    private $lastName;
    private $groupId;
    private $pdo;
    private $customerGroups;

    public function __construct($firstName, $lastName, $groupId, $pdo, $customerGroups)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->groupId = $groupId;
        $this->pdo = $pdo;
        $this->customerGroups = $customerGroups;

    }

    public function getGroups()
    {
        $groupId = $this->groupId;

        do{
            $handler = $this->pdo->prepare('SELECT * FROM customer_group WHERE id = :id');
            $handler->bindValue(':id', $groupId);
            $handler->execute();
            $customerGroup = $handler->fetch();
            array_push($this->customerGroups, $customerGroup);

            $groupId = $customerGroup['parent_id'];
        } while($groupId != null);

    }

    public function getFirstName()
    {
        return $this->firstName;
    }


    public function getLastName()
    {
        return $this->lastName;
    }

}

