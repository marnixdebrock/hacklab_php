<?php
namespace Marnix\BookManagementSystem\services;
use Marnix\BookManagementSystem\repositories\BookRepository;
use Marnix\BookManagementSystem\repositories\MagazineRepository;

class ItemService
{
    private BookRepository $bookRepository;
    private MagazineRepository $magazineRepository;

    public function __construct(BookRepository $bookRepository, MagazineRepository $magazineRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->magazineRepository = $magazineRepository;
    }

    public function getAll(): array
    {
        return array_merge($this->bookRepository->getAll(), $this->magazineRepository->getAll());
    }

}