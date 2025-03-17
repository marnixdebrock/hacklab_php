<?php

use Marnix\BookManagementSystem\MainOld;
use Marnix\BookManagementSystem\models\Author;
use Marnix\BookManagementSystem\models\Book;
use Marnix\BookManagementSystem\repositories\BookRepository;
use PHPUnit\Framework\TestCase;

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

        $main = new MainOld($mockBR);
        $main->showBookCatalog();

        $output = $this->getActualOutputForAssertion();
        foreach($testBooks as $testBook){
            $this->assertStringContainsString($testBook->getTitle(), $output);
        }
    }

}