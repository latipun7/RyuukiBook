<?php

namespace App\Http\Controllers;

use Session;
use App\Book;
use App\Order;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class BookStoreController extends Controller
{
	protected $featured;
	protected $books;

	public function __construct()
	{
		$this->featured = Book::latest()->first();
		$this->books    = Book::latest()->paginate(4);
	}

	/**
	 * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
	 */
    public function index() {
    	$books 	  = $this->books;
    	$featured = $this->featured;
		return view('bookstore.index')->with(compact('featured', 'books'));
	}

	/**
	 * Show detail
	 * @param  [type] $id 
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$book = Book::find($id);
		return view('bookstore.show')->with(compact('book'));
	}

	/**
	 * Add item to cart
	 * @param int $id [item id]
	 */
	public function addToCart($id)
	{
		$book 	  = Book::find($id);
    	$books 	  = $this->books;
    	$featured = $this->featured;

		$id          = $book->id;
		$title       = $book->title;
		$qty         = 1;
		$price       = $book->price;

		$data = [
			'id'          => $id,
			'name'        => $title,
			'qty'         => $qty,
			'price'       => $price
		];

		Cart::instance('shopping')->add($data);
		return redirect('/');
	}
}
