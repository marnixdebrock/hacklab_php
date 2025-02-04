<?php

namespace Marnix\BookManagementSystem;
class Main
{
    private array $authors;
    private bookRepository $bookRepository;

    public function __construct(bookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->authors = [];
    }

    public function showMainMenu(): void
    {
        echo "Pick one of the 4 options and enter its respective index.\n";
        echo "1. Add Book - - 2. Show all Books  - - 3. Remove Book - - 4. Show Authors Books - - 5. Exit:\n";
        $userInput = readline();

        switch($userInput){
            case '1':
                $this->handleAddbook();
                break;
            case '2':
                $this->showAllBooks();
                break;
            case '3':
                $this->handleRemoveBook();
                break;
            case '4':
                $this->handleShowAuthorsBooks();
                break;
            case '5':
                break;
        }
    }

    public function handleAddBook(): void
    {
        $this->bookRepository->add(new Book(...$this->showBookForm()));
    }

    public function showBookForm(): array
    {
        if(empty($this->authors))
        {
            $author = $this->showAuthorsForm();
        }else{
            $author = $this->handleAddAuthor();
        }



        echo "Enter book title:\n";
        $userInputBookTitle = readline();

        echo "Enter book ISBN:\n";
        $userInputBookIsbn = readline();

        echo "Enter book publisher:\n";
        $userInputBookPublisher = readline();

        echo "Enter book publishing date:\n";
        $userInputBookPublishDate = readline();

        echo "Enter amount of book pages:\n";
        $userInputBookPages = readline();

        if (is_int($userInputBookPages) === false)
        {
            echo "Invalid input\n";
            $userInputBookPages = 0;
        }else{
            $userInputBookPages = (int)$userInputBookPages;
        }
        return array($userInputBookTitle, $author, $userInputBookIsbn, $userInputBookPublisher, $userInputBookPublishDate, $userInputBookPages);

    }

    public function showAuthorsForm(): Author
    {
        echo "Enter the first name of the author you would like to add:\n";
        $userInputAuthorFirstName = readline();

        echo "Enter the last name of the author you would like to add\n";
        $userInputAuthorLastName = readline();

        echo "Enter the date of birth of the author you would like to add\n";
        $userInputAuthorDateOfBirth = readline();


        $author = [$userInputAuthorFirstName, $userInputAuthorLastName, $userInputAuthorDateOfBirth];
        $author = new Author(...$author);
        $this->addAuthor($author);
        return $author;
    }

    public function handleAddAuthor(): Author
    {
        echo "Would you like to add an author?(y/n):";
        $userInput = readline();
         return match ($userInput) {
            "y" => $this->showAuthorsForm() ,
            default => $this->showAuthorList(),
        };
    }


    public function addAuthor(Author ...$author): void
    {
        $this->authors = array_merge($this->authors, $author);
    }


    public function showAllBooks(): void
    {
        $this->showBookCatalog();
    }


    public function showBookCatalog(): void
    {
        $books = $this->bookRepository->getAll();

        if(!$books){
            echo "No books in the catalog\n";
        }else{
            foreach ($books as $book) {
                echo $book->getId() . '. ' .  $book->getTitle() . ' by ' . $book->getAuthor()->getFirstName() . " " . $book->getAuthor()->getLastName() . "\n";
            }
        }
    }


    public function handleRemoveBook(): void
    {
        $id = $this->showRemoveBookForm();
        $this->showRemoveBookDialog($id);
    }


    public function showRemoveBookForm(): string
    {
        echo "Pick one of the options to delete and enter its respective index. Or press enter to cancel.\n";
        $this->showBookCatalog();
        return readline();
    }


    public function handleShowAuthorsBooks(): void
    {
        $author = $this->showAuthorList();
        $this->bookRepository->getBooksByAuthor($author);
    }


    public function showBookDetails(int $id):void {}


    public function showRemoveBookDialog(int $id):void
    {
        echo "Are you sure you want to delete this book? (y/n):\n";
        $userInput = readline();
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
        if(!empty($this->authors)){
            foreach ($this->authors as $author) {
                echo $author->getId() . '. ' . $author->getFirstName() . "\n";
            }
        }else{
            echo "No authors in the catalog";
        }

        echo "Pick one of the options and enter its respective index.\n";
        $userInput = readline();
        switch ($userInput) {
            case $this->authors->getId():
                return $userInput;
            default:
                echo "invalid option\n";
                break;
        }
        return 0;
    }
}