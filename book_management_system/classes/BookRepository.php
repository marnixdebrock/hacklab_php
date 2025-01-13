<?php

class BookRepository
{
    private array $books;

    public function __construct(array $books)
    {
        $this->books = array();
    }

    public function add(Book ...$books): void
    {
        $this->books = array_merge($this->books, $books);
    }

    public function get(int $id){}

    public function getAll(){}

    public function delete(int $id){}


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

