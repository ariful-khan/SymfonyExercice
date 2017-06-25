<?php

namespace AppBundle\Controller;

use AppBundle\Service\BookService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
}
