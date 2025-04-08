<?php
namespace Marnix\BookManagementSystem\models;

use DateTime;

class Book extends Item
{
    private readonly int $authorId;
    private readonly string $isbn;
    private readonly string $publisher;
    private readonly DateTime $publicationDate;
    private readonly int $pages;

    public function __construct(?int $id, string $title, int $authorId, string $isbn, string $publisher, DateTime $publicationDate, int $pages)
    {
        parent::__construct($id, $title);
        $this->authorId = $authorId;
        $this->isbn = $isbn;
        $this->publisher = $publisher;
        $this->publicationDate = $publicationDate;
        $this->pages = $pages;
    }

    /**
     * @throws \DateMalformedStringException
     */
    public static function fromArray(array $data): Book
    {
        return new self(
            $data['id'],
            $data['title'],
            $data['authorId'],
            $data['isbn'],
            $data['publisher'],
            new \DateTime($data['publicationDate']),
            $data['pages']
        );
    }

    public function toArray(): array
    {
        return ['id' => $this->id,
                'title' => $this->title,
                'authorId' => $this->authorId,
                'isbn' => $this->isbn,
                'publisher' => $this->publisher,
                'publicationDate' =>$this->publicationDate->format("Y-m-d"),
                'pages' => $this->pages];
    }

    public function getOverviewText(): string
    {
        return strval($this->title . ' ' . $this->authorId . ' ' . $this->getPublicationDate() . ' ' . $this->pages);
    }



    public function getAuthorName(): string
    {
        return $this->author['firstName'];
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function getPublisher(): string
    {
        return $this->publisher;
    }

    public function getPublicationDate(): string
    {
        return $this->publicationDate->format('d-m-Y');
    }

    public function getPublicationDateAsString()
    {
        return strval($this->publicationDate);
    }

    public function getPages()
    {
        return strval($this->pages);
    }
}