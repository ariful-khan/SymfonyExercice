<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

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
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $name;

    /**
     * @ORM\Column(type="date")
     */
    private $releaseDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $length;

    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Genre", inversedBy="books")
     * @ORM\JoinTable(name="books_genres")
     */
    private $genres;

    public function __construct() {
        $this->genres = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="boolean")
     */
    private $userReadable;

    /**
     * @ORM\Column(type="boolean")
     */
    private $adminReadable;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @param mixed $releaseDate
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param mixed $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return mixed
     */
    public function getGenres()
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
     * @return mixed
     */
    public function getUserReadable()
    {
        return $this->userReadable;
    }

    /**
     * @param mixed $userReadable
     */
    public function setUserReadable($userReadable)
    {
        $this->userReadable = $userReadable;
    }

    /**
     * @return mixed
     */
    public function getAdminReadable()
    {
        return $this->adminReadable;
    }

    /**
     * @param mixed $adminReadable
     */
    public function setAdminReadable($adminReadable)
    {
        $this->adminReadable = $adminReadable;
    }
}
