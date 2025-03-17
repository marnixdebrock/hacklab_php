<?php
namespace Marnix\BookManagementSystem\controllers;
class MainController
{
    public function showMainMenu(): void
    {
        include_once 'views/main-menu.html';
    }
}

