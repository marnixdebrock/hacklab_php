<?php
class Main
{
    private readonly array $authors;
    private readonly bookRepository $bookrepository;

//    public function __construct(array $authors, bookRepository $bookrepository)
//    {
//        $this->authors = $authors;
//        $this->bookrepository = $bookrepository;
//    }

    public function showMainMenu()
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
                global $run;
                break;
        }
    }

    public function handleAddBook(): void
    {
        $book = showBookForm();
        addBook($book);
    }

    public function showBookForm(): array
    {
        $author = showAuthorsMenu();
        echo "Author: $author\n";
        echo "Fill in the name of the book you would like to add.\n";
        $userInput = readline();

        return array($userInput, $author);

    }

    public function showAuthorsMenu(): string
    {
        while(true) {
            global $authors;
            $indexCounter = 1;
            foreach ($authors as $author) {
                echo $indexCounter . ' ' . $author . "\n";
                $indexCounter++;
            }
            echo "Pick one of the options and enter its respective index.\n";
            $userInput = readline();
            switch ($userInput) {
                case '1':
                    return $authors[0];
                case '2':
                    return $authors[1];
                case '3':
                    return $authors[2];
                default:
                    echo "invalid option\n";
                    break;
            }
        }
    }



    public function showAllBooks(): void
    {
        showBookCatalog();
    }

    public function showBookCatalog(): void
    {
        global $books;

        $counter = 0;
        if(!$books){
            echo "No books in the catalog\n";
        }else{
            foreach ($books as $book) {
                echo $counter . '. ' .  $book[0] . ' by ' . $book[1] . "\n";
                $counter++;
            }
        }
    }

    public function handleRemoveBook(): void
    {
        $book = showRemoveBookForm();
        removeBook($book);

    }

    public function showRemoveBookForm(): string
    {
        echo "Pick one of the options to delete and enter its respective index. Or press enter to cancel.\n";
        showBookCatalog();
        return readline();
    }

    public function handleShowAuthorsBooks(): void
    {
        $author = showAuthorsMenu();
        getBooksByAuthor($author);

    }

    public function showBookDetails(int $id):void {}

    public function showRemoveBookDialog(int $id):void {}








}