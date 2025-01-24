<?php

use Marnix\BookManagementSystem\Book;
use PHPUnit\Framework\TestCase;
use Marnix\BookManagementSystem\BookRepository;
use Marnix\BookManagementSystem\Author;

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