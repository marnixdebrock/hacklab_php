<?php
namespace Marnix\BookManagementSystem\repositories;
use Marnix\BookManagementSystem\models\Book;
use Marnix\BookManagementSystem\services\QueryBuilder;


class BookRepository
{

    private QueryBuilder $queryBuilder;

    public function __construct()
    {
        $this->queryBuilder = new QueryBuilder('books');
    }

    public function add(Book $book): void
    {
        $this->queryBuilder->add($book);
    }

    public function get(int $id): Book
    {
       return Book::fromArray($this->queryBuilder->get($id)[0]);
    }

    /**
     * @throws \DateMalformedStringException
     */
    public function getAll(): array
    {
        return $this->toBooks(($this->queryBuilder->getAll()));
    }

    public function delete(int $id): void
    {
        $this->queryBuilder->delete($id);
    }


    public function getBooksByAuthor(int $id): void
    {
        foreach ($this->books as $book) {
            if($book->getAuthor()->getId() == $id){
                echo $id . '. ' . $book->getTitle() . "\n";
            }
        }
    }

    /**
     * @throws \DateMalformedStringException
     */
    public static function toBooks($books): array
    {
        if($books == [])
        {
            echo 'No Books in Catalog';
            return $data[] = [];
        }else{
            foreach ($books as $book)
            {
                $data[] = Book::fromArray($book);
            }
            return $data;
        }
    }
}

