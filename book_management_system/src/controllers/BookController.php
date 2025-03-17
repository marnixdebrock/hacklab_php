<?php
namespace Marnix\BookManagementSystem\controllers;
use Marnix\BookManagementSystem\models\Author;
use Marnix\BookManagementSystem\models\Book;
use Marnix\BookManagementSystem\repositories\AuthorRepository;
use Marnix\BookManagementSystem\repositories\BookRepository;

class BookController
{

    private AuthorRepository $authorRepository;
    private BookRepository $bookRepository;

    public function __construct(BookRepository $bookRepository, AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
        $this->bookRepository = $bookRepository;
    }

    public function handleAddBook(): void
    {
        var_dump($id = $this->bookRepository->add(new Book(
            $_POST['title'],
            $_POST['author'],
            $_POST['isbn'],
            $_POST['publisher'],
            $_POST['publicationDate'],
            $_POST['pages']
        )));

//        header('Location: /?page=book&action=show&id=' . $id);
    }

    public function showBookForm(): void
    {
        require_once 'views/book-form.html';

//        if (empty($this->authorRepository->getAll())) {
//            $author = $this->showAuthorForm();
//        } else {
//            $author = $this->handleAddAuthor();
//        }
//
//
//        $userInputBookTitle;
//        $userInputBookIsbn;
//        $userInputBookPublisher;
//        $userInputBookPublishDate;
//        $userInputBookPages;
//
//
//        if (is_int($userInputBookPages)) {
//            echo "Invalid input\n";
//            $userInputBookPages = 0;
//        } else {
//            $userInputBookPages = (int)$userInputBookPages;
//        }
//        return array($userInputBookTitle, $author, $userInputBookIsbn, $userInputBookPublisher, $userInputBookPublishDate, $userInputBookPages);
    }

    public function showAllBooks(): void
    {
        include_once '../views/book-list.html';
    }

    public function handleRemoveBook(int $id): void
    {

    }

    public function handleShowAuthorBook(): void
    {
    }

    public function showRemoveBookDialogue(int $id): void
    {
    }


    public function showAuthorForm(): Author
    {
        require_once '../views/author-form.html';


//        $author = [$authorFirstName, $authorLastName, $authorDateOfBirth];
//        return $this->authorRepository->getOrCreate($author);
    }

    public function handleAddAuthor(): Author
    {
    }


    public function showBookCatalog(): void
    {
        $books = $this->bookRepository->getAll();

        if (!$books) {
            echo "No books in the catalog\n";
        } else {
            foreach ($books as $book) {
                echo $book->getId() . '. ' . $book->getTitle() . ' by ' . $book->getAuthor()->getFirstName() . " " . $book->getAuthor()->getLastName() . "\n";
            }
        }
    }

//    public function handleRemoveBook(): void
//    {
//        $id = $this->showRemoveBookForm();
//        $this->showRemoveBookDialog($id);
//    }

    public function showRemoveBookForm(): string
    {
        $this->showBookCatalog();
        return readline();
    }

    public function handleShowAuthorsBooks(): void
    {
        $author = $this->showAuthorList();
        $this->bookRepository->getBooksByAuthor($author);
    }

    public function showBookDetails(int $id): void
    {
    }

    public function showRemoveBookDialog(int $id): void
    {
        switch ($userInput) {
            case 'y':
                $this->bookRepository->delete($id);
                break;
            default:
                echo "Book not deleted\n";
                break;
        }
    }

    private function showAuthorList(): int
    {
        $authors = $this->authorRepository->getAll();
        $userInput = null;
        while (array_find($authors, fn($author) => $author->getId() === $userInput) == null) {
            if (!empty($authors)) {
                foreach ($authors as $author) {
                    echo $author->getId() . '. ' . $author->getFirstName() . "\n";
                }
            } else {
                echo "No authors in the catalog";
            }

            echo "Pick one of the options and enter its respective index.\n";
            $userInput = (int)readline();
        }
        return $userInput;

    }
}