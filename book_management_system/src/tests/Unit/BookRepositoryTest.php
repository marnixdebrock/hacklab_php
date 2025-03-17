<?php

use Marnix\BookManagementSystem\models\Author;
use Marnix\BookManagementSystem\models\Book;
use Marnix\BookManagementSystem\repositories\BookRepository;
use PHPUnit\Framework\TestCase;

class BookRepositoryTest extends TestCase
{
    public function testBookRepositorygetAll()
    {
        $bookRepository = new BookRepository();
        $author = new Author("J.R.R.", "Tolkien", "DateOFBirth");

        $bookRepository->add(new Book("The Hobbit", $author, 1937,
        "testPublisher", "TestPublicationDate", 1));

        $books = $bookRepository->getAll();

        $this->assertNotEquals([], $books);
    }
}