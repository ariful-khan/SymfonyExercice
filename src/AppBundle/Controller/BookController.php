<?php

namespace AppBundle\Controller;

use AppBundle\Service\BookService;
use AppBundle\Util\SerializerFactory;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class BookController extends Controller
{
    /**
     * @param BookService $bookService
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/", name="homepage")
     */
    public function indexAction(BookService $bookService)
    {
        $books = $bookService->getAllBookByLimitAndOffset(5, 0);
        return $this->render('book/index.html.twig', ['books' => $books]);
    }

    /**
     * @param $genre
     * @param BookService $bookService
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/genre/{genre}", name="genre-page")
     */
    public function genreAction($genre, BookService $bookService)
    {
        $books = $bookService->getBooksByGenreName($genre);
        return $this->render('book/genre.html.twig', ['genre' => $genre, 'books' => $books]);
    }

    /**
     * @param $nameOfTheBook
     * @param BookService $bookService
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/book/{nameOfTheBook}", name="book-page")
     */
    public function nameOfTheBookAction($nameOfTheBook, BookService $bookService)
    {
        $book = $bookService->getBookByName($nameOfTheBook);
        return $this->render('book/book.html.twig', ['book' => $book]);
    }

    /**
     * @param $offset
     * @param $limit
     * @param BookService $bookService
     * @param SerializerFactory $serializerFactory
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/book-api/getBook/{offset}/{limit}", name="book-api")
     */
    public function getBookAction($offset, $limit, BookService $bookService, SerializerFactory $serializerFactory)
    {
        $serializer = $serializerFactory->getSerializer(function ($object) {
            return $object->getName();
        });

        $books = $bookService->getAllBookByLimitAndOffset($limit, $offset);
        return JsonResponse::fromJsonString($serializer->serialize($books, 'json'));
    }
}
