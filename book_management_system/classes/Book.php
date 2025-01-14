<?php

class Book
{
    private static int $count = 0;
    private int $id;
    private readonly string $title;
    private readonly string $author;
    private readonly string $isbn;
    private readonly string $publisher;
    private readonly string $publicationDate;
    private readonly int $pages;

    public function __construct(string $title, string $author, string $isbn, string $publisher, string $publicationDate, int $pages)
    {
        $this->id = ++static::$count;
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