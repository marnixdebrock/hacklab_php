<?php
namespace Marnix\BookManagementSystem\models;
use Cassandra\Date;
use DateTime;
class Magazine extends Item
{
    private string $editor;
    private string $issn;
    private string $publisher;
    private DateTime $publicationDate;
    private int $occurrence;



    public function __construct(?int $id, string $title, string $editor, string $issn, string $publisher, DateTime $publicationDate, int $occurrence)
    {
        parent::__construct($id, $title);
        $this->editor = $editor;
        $this->issn = $issn;
        $this->publisher = $publisher;
        $this->publicationDate = $publicationDate;
        $this->occurrence = $occurrence;
    }
    public static function fromArray(array $data): Magazine
    {
        return new self(
            $data['id'],
            $data['title'],
            $data['editor'],
            $data['issn'],
            $data['publisher'],
            new \DateTime($data['publicationDate']),
            $data['occurrence']
        );
    }
    public function toArray(): array
    {
        return ['id' => $this->id,
            'title' => $this->title,
            'editor' => $this->editor,
            'issn' => $this->issn,
            'publisher' => $this->publisher,
            'publicationDate' =>$this->publicationDate->format("Y-m-d"),
            'occurrence' => $this->occurrence];
    }
    public function getOverviewText(): string
    {
        return strval($this->title . ' ' . $this->editor . ' ' . $this->getPublicationDateAsString() . ' ' . $this->occurrence);
    }

    public function getEditor(): string
    {
        return $this->editor;
    }

    public function getIssn()
    {
        return $this->issn;
    }

    public function getPublisher()
    {
        return $this->publisher;

    }

    public function getPublicationDate()
    {
        return $this->publicationDate->format('d-m-Y');
    }

    public function getOccurrence()
    {
        return $this->occurrence;
    }

    public function getPublicationDateAsString()
    {
        return strval($this->publicationDate->format('d-m-Y'));
    }


}