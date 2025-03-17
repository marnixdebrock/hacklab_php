<?php

namespace Marnix\BookManagementSystem\models;

class Author extends Item
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

    public function toArray(): array
    {
        return ['firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'id' => $this->id];
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
        return $this->dateOfBirth;
    }

    public function getDateOfBirthAsString(){}

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

}