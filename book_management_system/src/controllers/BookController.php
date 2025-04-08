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

    /**
     * @throws \DateMalformedStringException
     */
    public function handleAddBook(): void
    {
        $book = new Book(
            null,
            $_POST['title'],
            $this->handleAddAuthor(),
            $_POST['isbn'],
            $_POST['publisher'],
            new \DateTime( $_POST['publicationDate']),
            $_POST['pages']);

        $this->bookRepository->add($book);

        header('Location: /?page=book&action=show&id=' . $book->getId());
    }

    /**
     * @throws \DateMalformedStringException
     */
    public function handleAddAuthor(): int
    {
        $author = new Author(
            $_POST['firstName'],
            $_POST['lastName'],
            new \DateTime( $_POST['dateOfBirth']));

        $this->authorRepository->add($author);

        return $author->getId();
    }
    public function showBookForm(): void
    {
        include_once 'views/book-form.html';
    }
    public function showAllBooks(): void
    {
        $books = $this->bookRepository->getAll();

        include_once 'views/book-list.html';
    }
    public function handleRemoveBook(int $id): void
    {
        $this->bookRepository->delete($id);
    }
    public function showBookDetails(int $id): void
    {
        $book = $this->bookRepository->get($id);

        include_once 'views/book-details.html';
    }
}