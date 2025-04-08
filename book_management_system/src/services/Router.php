<?php
namespace Marnix\BookManagementSystem\services;

use Marnix\BookManagementSystem\controllers\BookController;
use Marnix\BookManagementSystem\controllers\MagazineController;
use Marnix\BookManagementSystem\controllers\MainController;
use Marnix\BookManagementSystem\controllers\ItemController;
use Marnix\BookManagementSystem\repositories\AuthorRepository;
use Marnix\BookManagementSystem\repositories\BookRepository;
use Marnix\BookManagementSystem\repositories\MagazineRepository;

use Marnix\BookManagementSystem\services\ItemService;


class Router
{
    public function __construct(){}

    public function route(): void
    {
        $page = $_GET['page'] ?? 'home';
        $authorRepository = new AuthorRepository();
        $bookRepository = new BookRepository();
        $magazineRepository = new MagazineRepository();
        $mainController = new MainController();
        $bookController = new BookController($bookRepository, $authorRepository);
        $magazineController = new MagazineController($magazineRepository);
        $itemService = new ItemService($bookRepository, $magazineRepository);
        $itemController = new ItemController($itemService);

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
                    case 'remove':
                        $bookController->handleRemoveBook($_GET['id']);
                    default:
                        $bookController->showAllBooks();
                }
                break;
            case 'magazine':
                switch ($_GET['action'])
                {
                    case 'create':
                        $magazineController->showMagazineForm();
                        break;
                    case 'store':
                        $magazineController->handleAddMagazine();
                        break;
                    case 'show':
                        $magazineController->showMagazineDetails($_GET['id']);
                        break;
                    case 'remove':
                        $magazineController->handleRemoveMagazine($_GET['id']);
                    default:
                        $magazineController->showAllMagazines();
                }
                break;
            case 'item':
            default:
                $itemController->showAll();
        }
    }
}