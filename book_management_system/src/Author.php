<?php

namespace Marnix\BookManagementSystem;

class Author
{
    private static int $count = 0;
    private int $id;

    private readonly string $firstName;

    private readonly string $lastName;

    private readonly string $dateOfBirth;


    public function __construct(string $firstName, string $lastName, string $dateOfBirth)
    {
        $this->id = ++static::$count;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dateOfBirth = $dateOfBirth;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getDateOfBirth(): string
    {
        return $this->getDateOfBirth();
    }

    public function getDateOfBirthAsString(){}

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

}