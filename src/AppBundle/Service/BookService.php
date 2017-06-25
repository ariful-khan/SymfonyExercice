<?php

namespace AppBundle\Service;

use AppBundle\Entity\Book;
use AppBundle\Entity\Genre;
use AppBundle\Repository\{
    GenreRepository, BookRepository
};
use Doctrine\ORM\EntityManagerInterface;

class BookService
{
    /**
     * @var GenreRepository
     */
    private $genreRepository;

    /**
     * @var BookRepository
     */
    private $bookRepository;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->genreRepository = $em->getRepository('AppBundle:Genre');
        $this->bookRepository = $em->getRepository('AppBundle:Book');
    }

    /**
     * @param $bookName
     * @return null|Book
     */
    public function getBookByName($bookName)
    {
        return $this->bookRepository->findOneBy(['name' => $bookName]);
    }

    /**
     * @param $genreName
     * @return array
     */
    public function getBooksByGenreName($genreName): array
    {
        /** @var Genre $genre */
        $genre = $this->genreRepository->findOneBy(['name' => $genreName]);

        if (!$genre) {
            return [];
        }

        $genre->getBooks();
    }

    /**
     * @param null $limit
     * @param null $offset
     * @return array
     */
    public function getAllBookByLimitAndOffset($limit = null, $offset = null): array
    {
        return $this->bookRepository->findBy([], null, $limit, $offset);
    }
}
