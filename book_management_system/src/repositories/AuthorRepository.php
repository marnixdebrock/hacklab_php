<?php
namespace Marnix\BookManagementSystem\repositories;
use Marnix\BookManagementSystem\models\Author;

class AuthorRepository
{
    private array $authors;

    public function __construct()
    {
        $this->authors = [];
    }

    public function getAll(): array
    {
        return $this->authors;
    }

    public function add(Author ...$authors): void
    {
        $this->authors = array_merge($this->authors, $authors);
    }

    public function getOrCreate(array $authorData): Author
    {
        $author = $this->getByComparison($authorData);
        if(!$author)
        {
            [$authorFirstName, $authorLastName, $authorDateOfBirth] = $authorData;
            $author = new Author($authorFirstName, $authorLastName, $authorDateOfBirth);
            $this->add($author);
        }
        return $author;
    }

    private function getByComparison($authorData)
    {
        [$authorFirstName, $authorLastName, $authorDateOfBirth] = $authorData;
        return array_find($this->authors, fn($author) => $author->getFirstName() == $authorFirstName
            and $author->getLastName() == $authorLastName
            and $author->getDateOfBirth() == $authorDateOfBirth);
    }
}