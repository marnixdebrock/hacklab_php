<?php
namespace Marnix\BookManagementSystem\controllers;
use Marnix\BookManagementSystem\services\ItemService;


class ItemController
{
    private ItemService $itemService;

    public function __construct($itemService)
    {
        $this->itemService = $itemService;
    }

    public function showAll(): void
    {
        $items = $this->itemService->getAll();
        include_once 'views/item-list.html';
    }
}