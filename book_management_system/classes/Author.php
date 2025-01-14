<?php

class Author
{
    private static int $count = 0;
    private int $id;

    private readonly string $firstName;

    private readonly string $lastName;

    private readonly DateTimeImmutable $dateOfBirth;


    public function __construct(int $id, string $firstName, string $lastName, DateTimeImmutable $dateOfBirth)
    {
        $this->id = ++static::$count;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dateOfBirth = $dateOfBirth;
    }

    public function getId(){}

    public function getFirstName(){}

    public function getLastName(int $id){}

    public function getDateOfBirth(){}

    public function getDateOfBirthAsString(){}



}