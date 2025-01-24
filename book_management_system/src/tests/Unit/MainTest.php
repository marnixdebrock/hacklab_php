<?php

use Marnix\BookManagementSystem\Main;
use PHPUnit\Framework\TestCase;
use Marnix\BookManagementSystem\BookRepository;
use Marnix\BookManagementSystem\Book;
use Marnix\BookManagementSystem\Author;

class MainTest extends TestCase
{
    public function testMain()
    {

        $testBooks =  [
            new Book("test", new Author("test", "test", "test"), 1999, "test", "test", 1),
            new Book("hobbit", new Author("test", "test", "test"), 1999, "test", "test", 1)
        ];

        $mockBR = $this->createMock(BookRepository::class);
        $mockBR->method('getAll')->willReturn(
            $testBooks
        );

        $main = new Main($mockBR);
        $main->showBookCatalog();

        $output = $this->getActualOutputForAssertion();
        foreach($testBooks as $testBook){
            $this->assertStringContainsString($testBook->getTitle(), $output);
        }
    }

}