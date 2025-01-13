<?php

class Book
{
    private readonly int $id;
    private readonly string $title;
    private readonly string $author;
    private readonly string $isbn;
    private readonly string $publisher;
    private readonly DateTimeImmutable $publicationDate;
    private readonly int $pages;

    public function __construct(int $id, string $title, string $author, string $isbn, string $publisher, DateTimeImmutable $publicationDate, int $pages)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->publisher = $publisher;
        $this->publicationDate = $publicationDate;
        $this->pages = $pages;

    }

    public function getId(){}

    public function getTitle(){}

    public function getAuthor(){}

    public function getAuthorName(){}

    public function getIsbn(){}

    public function getPublisher(){}

    public function getPublicationDate(){}

    public function getPublicationDateAsString(){}






}