<?php
namespace Marnix\BookManagementSystem\services;

use Marnix\BookManagementSystem\controllers\BookController;
use Marnix\BookManagementSystem\controllers\MainController;
use Marnix\BookManagementSystem\repositories\AuthorRepository;
use Marnix\BookManagementSystem\repositories\BookRepository;

class Router
{
    public function __construct(){}

    public function route(): void
    {
        $page = $_GET['page'] ?? 'home';
        $authorRepository = new AuthorRepository();
        $bookRepository = new BookRepository();
        $mainController = new MainController();
        $bookController = new BookController($bookRepository, $authorRepository);

        switch($page)
        {
            case 'home';
                $mainController->showMainMenu();
                break;
            case 'book':
                switch ($_GET['action'])
                {
                    case 'create':
                        $bookController->showBookForm();
                        break;
                    case 'store':
                        $bookController->handleAddBook();
                        break;
                    case 'show':
                        $bookController->showBookDetails($_GET['id']);
                        break;
                    default:
                        $bookController->showAllBooks();
                }
                break;
        }
    }
}