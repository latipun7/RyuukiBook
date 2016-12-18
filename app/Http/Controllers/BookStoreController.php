<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use App\Book;
use App\Order;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class BookStoreController extends Controller
{
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
		$book = Book::find($id);

		$data = [
			'id'	=> $book->id,
			'name'	=> $book->title,
			'qty'	=> 1,
			'price'	=> $book->price,
			'options' => [
				'category' => $book->category->name,
				'cover'	   => $book->cover
			]
		];

		Cart::instance('shopping')->add($data);
		return redirect('/');
	}

	/**
	 * Show cart
	 */
	public function showCart()
	{
		$cart_content = Cart::instance('shopping')->content();
		return view('bookstore.showCart')->with(compact('cart_content'));
	}

	/**
	 * Remove Item from cart
	 * @param  [int] $id [item id]
	 * @return 
	 */
	public function removeItem($rowId) {
		Cart::instance('shopping')->remove($rowId);
		$cart_content = Cart::content();

		if (Cart::count() == 0) {
		 	return redirect('/')->with("flash_notification", ['message' => 'Cart empty.', 'level' => 'warning']);
		 }
		else {
			return view('bookstore.showCart')->with(compact('cart_content'));
		}
	}

	/**
	 * Checkout items
	 */
	public function checkout()
	{
		$invoice = md5(time());
		$profile = User::find(Auth::id());
		return view('bookstore.checkout')->with(compact('invoice','profile'));
	}
}
