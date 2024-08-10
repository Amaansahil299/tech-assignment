<?php

namespace App\Message;

class UserCreated
{
    private $email;
    private $firstName;
    private $lastName;

    /**
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(
        string $email,
        string $firstName,
        string $lastName
    ) {
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }
}
