<?php

namespace App\Http\Controllers;

use Session;
use App\Book;
use App\Order;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class BookStoreController extends Controller
{
	/**
	 * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
	 */
    public function index() {
    	$featured = Book::latest()->first();
		$books    = Book::latest()->paginate(4);
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
}
