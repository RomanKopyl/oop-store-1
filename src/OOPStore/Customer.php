<?php

namespace OOPStore;

class Customer implements CustomerInterface
{
    private $firstName;
    private $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFirstName(): str
    {
        return $this->firstName;
    }

    public function getLastName(): str
    {
        return $this->lastName;
    }
}
