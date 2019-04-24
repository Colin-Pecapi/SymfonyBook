<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;

class BookController extends AbstractController
{
	private $books = [];
	private $bookList =
					[
							['title'=>'Lotr1', 'author'=> 'Tolkien'],
							['title'=>'Lotr2', 'author'=> 'Tolkien'],
							['title'=>'Lotr3', 'author'=> 'Tolkien'],
					];

	/**
	 * 
	 */
	function __construct($foo = null)
	{


    	foreach ($this->bookList as $key => $oneBook) {

			$aBook = new Book();
			
			$aBook->setTitle($oneBook['title']); 
			$aBook->setAuthor($oneBook['author']); 
			
			$this->books[$key] = $aBook;
    	}
	}

	/**
     * @Route("/", name="index")
     */
    public function index()
    {


        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
            'page' => 'Home',
        ]);
    }
    /**
     * @Route("/books", name="books")
     */
    public function books()
    {
        return $this->render('book/books.html.twig', [
            'controller_name' => 'BookController',
            'page' => 'Books',
            'books' => $this->books
        ]);
    }

    /**
     * @Route("/book/{id}", name="book")
     */
    public function book($id)
    {
        return $this->render('book/book.html.twig', [
            'controller_name' => 'BookController',
            'page' => 'Book',
            'book' => $this->books[$id]
        ]);
    }


}
