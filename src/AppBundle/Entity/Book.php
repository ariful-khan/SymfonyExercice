<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookRepository")
 * @ORM\Table(name="book", indexes={@ORM\Index(name="name_idx", columns={"name"})})
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=256)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="date")
     * @var \DateTime
     */
    private $releaseDate;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $length;

    /**
     * @ORM\ManyToMany(targetEntity="Genre", inversedBy="books")
     * @ORM\JoinTable(name="books_genres")
     * @var PersistentCollection
     */
    private $genres;

    public function __construct()
    {
        $this->genres = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $userReadable;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $adminReadable;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return \DateTime
     */
    public function getReleaseDate(): \DateTime
    {
        return $this->releaseDate;
    }

    /**
     * @param \DateTime $releaseDate
     */
    public function setReleaseDate(\DateTime $releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param string $length
     */
    public function setLength(string $length)
    {
        $this->length = $length;
    }

    /**
     * @return PersistentCollection
     */
    public function getGenres(): PersistentCollection
    {
        return $this->genres;
    }

    /**
     * @param Genre $genre
     */
    public function addGenre(Genre $genre)
    {
        $this->genres->add($genre);
    }

    /**
     * @return bool
     */
    public function getUserReadable(): bool
    {
        return $this->userReadable;
    }

    /**
     * @param bool $userReadable
     */
    public function setUserReadable(bool $userReadable)
    {
        $this->userReadable = $userReadable;
    }

    /**
     * @return bool
     */
    public function getAdminReadable(): bool
    {
        return $this->adminReadable;
    }

    /**
     * @param bool $adminReadable
     */
    public function setAdminReadable(bool $adminReadable)
    {
        $this->adminReadable = $adminReadable;
    }
}
