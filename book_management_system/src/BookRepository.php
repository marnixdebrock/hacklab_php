<?php
namespace Marnix\BookManagementSystem;

class BookRepository
{
    private array $books;

    public function __construct() {
        $this->books = [];
    }

    public function add(Book ...$books): void
    {
        $this->books = array_merge($this->books, $books);
    }

    public function get(int $id){}

    public function getAll(): array
    {
        return $this->books;
    }

    public function delete(int $id): void
    {
        unset($this->books[$id]);
    }


    public function getBooksByAuthor(int $id): void
    {
        global $books;
        $counter = 0;
        foreach ($books as $book) {
            if($book[1] == $id){
                echo $counter . '. ' . $book[0] . "\n";
                $counter++;
            }
        }
    }
}

