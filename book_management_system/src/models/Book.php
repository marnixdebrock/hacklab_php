<?php
namespace Marnix\BookManagementSystem\models;

class Book extends Item
{
    private static int $count = 0;
    private int $id;
    private readonly string $title;
    private readonly Author $author;
    private readonly string $isbn;
    private readonly string $publisher;
    private readonly string $publicationDate;
    private readonly int $pages;

    public function __construct(string $title, Author $author, string $isbn, string $publisher, string $publicationDate, int $pages)
    {
        $this->id = ++static::$count;
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->publisher = $publisher;
        $this->publicationDate = $publicationDate;
        $this->pages = $pages;
    }

    public function toArray(): array
    {
        return ['id' => $this->id,
                'title' => $this->title,
                'author' => $this->author,
                'isbn' => $this->isbn,
                'publisher' => $this->publisher,
                'publicationDate',
                'pages' => $this->pages];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): Author
    {
        return $this->author;
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
        return $this->publicationDate;
    }

    public function getPublicationDateAsString(){}






}