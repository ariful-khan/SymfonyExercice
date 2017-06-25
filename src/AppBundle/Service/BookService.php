<?php

namespace AppBundle\Service;

use AppBundle\Entity\Book;
use AppBundle\Entity\Genre;
use AppBundle\Repository\{
    GenreRepository, BookRepository
};

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\PersistentCollection;

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
     * @return Book
     */
    public function getBookByName($bookName): Book
    {
        return $this->bookRepository->findOneBy(['name' => $bookName, 'userReadable' => true]);
    }

    /**
     * @param $genreName
     * @return array|PersistentCollection
     */
    public function getBooksByGenreName($genreName)
    {
        /** @var Genre $genre */
        $genre = $this->genreRepository->findOneBy(['name' => $genreName]);

        if (!$genre) {
            return [];
        }

        return $genre->getBooks();
    }

    /**
     * @param null $limit
     * @param null $offset
     * @return array
     */
    public function getAllBookByLimitAndOffset($limit = null, $offset = null): array
    {
        return $this->bookRepository->findBy(['userReadable' => true], null, $limit, $offset);
    }
}
