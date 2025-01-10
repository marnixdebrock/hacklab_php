<?php

$authors = ['J.K. Rowling', 'Stephen King', 'Dan Brown'];
$books = [];

$run = True;

while($run){
    showMainMenu();
}

function showMainMenu()
{
    echo "Pick one of the 4 options and enter its respective index.\n";
    echo "1. Add Book - - 2. Show all Books  - - 3. Remove Book - - 4. Show Authors Books - - 5. Exit:\n";
    $userInput = readline();

    switch($userInput){
        case '1':
            handleAddbook();
            break;
        case '2':
            showAllBooks();
            break;
        case '3':
            handleRemoveBook();
            break;
        case '4':
            handleShowAuthorsBooks();
            break;
        case '5':
            global $run;
            $run = False;
            break;
    }
}

function handleAddBook()
{
    $book = showBookForm();
    addBook($book);
}

function showBookForm(): array
{
    $author = showAuthorsMenu();
    echo "Author: $author\n";
    echo "Fill in the name of the book you would like to add.\n";
    $userInput = readline();

    return array($userInput, $author);

}

function showAuthorsMenu(): string
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

function addBook(array $book)
{
    global $books;
    $books[] = $book;
}

function showAllBooks()
{
    showBookCatalog();
}

function showBookCatalog()
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

function handleRemoveBook()
{
    $book = showRemoveBookForm();
    removeBook($book);

}

function showRemoveBookForm()
{
    echo "Pick one of the options to delete and enter its respective index. Or press enter to cancel.\n";
    showBookCatalog();
    return readline();
}

function removeBook($book)
{
    global $books;
    if ($book <= count($books)) {
        unset($books[$book]);
    }else{
        echo "invalid option\n";
    }

}

function handleShowAuthorsBooks()
{
    $author = showAuthorsMenu();
    getBooksByAuthor($author);

}

function getBooksByAuthor($author)
{
    global $books;
    $counter = 0;
    foreach ($books as $book) {
        if($book[1] == $author){
            echo $counter . '. ' . $book[0] . "\n";
            $counter++;
        }
    }
}