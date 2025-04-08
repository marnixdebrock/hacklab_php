<?php
namespace Marnix\BookManagementSystem\controllers;
use Marnix\BookManagementSystem\models\Magazine;
use Marnix\BookManagementSystem\repositories\MagazineRepository;


class MagazineController
{

    private MagazineRepository $magazineRepository;

    public function __construct(MagazineRepository $magazineRepository)
    {
        $this->magazineRepository = $magazineRepository;

    }

    /**
     * @throws \DateMalformedStringException
     */
    public function handleAddMagazine(): void
    {
        $magazine = new Magazine(
            null,
            $_POST['title'],
            $_POST['editor'],
            $_POST['issn'],
            $_POST['publisher'],
            new \DateTime( $_POST['publicationDate']),
            $_POST['occurrence']);

        $this->magazineRepository->add($magazine);

        header('Location: /?page=magazine&action=show&id=' . $magazine->getId());
    }

    /**
     * @throws \DateMalformedStringException
     */


    public function showMagazineForm(): void
    {
        include_once 'views/magazine-form.html';
    }

    public function showAllMagazines(): void
    {
        $magazines = $this->magazineRepository->getAll();

        include_once 'views/magazine-list.html';
    }

    public function handleRemoveMagazine(int $id): void
    {
        $this->magazineRepository->delete($id);
    }

    public function showMagazineDetails(int $id): void
    {
        $magazine = $this->magazineRepository->get($id);

        include_once 'views/magazine-details.html';
    }
}