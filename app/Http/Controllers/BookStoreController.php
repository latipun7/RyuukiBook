<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use App\Book;
use App\Item;
use App\Order;
use App\Profile;

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

	/**
	 * Store orders.
	 * @param StoreProfileRequest
	 */
	public function storeOrderStoreProfile(Request $request)
	{
		if ($request->plan == "PACKAGE") {
			$this->validate($request, [
				'phone'       => 'required|unique:profiles,phone',
	            'street'      => 'required',
	            'city'        => 'required',
	            'province'    => 'required',
	            'country'     => 'required',
	            'postal_code' => 'required|numeric'
			]);
		}

		$cart_content = Cart::instance('shopping')->content();

		$transaction  = new Order;
		$transaction->user_id  = Auth::id();
		$transaction->subtotal = "Rp ".Cart::subtotal(2, ',', '.');
		$transaction->tax      = "Rp ".Cart::tax(2, ',', '.');
		$transaction->invoice  = $request->invoice;
		$transaction->save();

		foreach ($cart_content as $cart) {
			$orders = new Item;
			$orders->book_id     = $cart->id;
			$orders->qty 	     = $cart->qty;
			$orders->total_price = $cart->price * $cart->qty;
			$transaction->items()->save($orders);
		}

		Cart::destroy();

		if ($request->plan == "PACKAGE") {
			$address = new Profile;
			$address->phone		  = $request->phone;
			$address->street 	  = $request->street;
			$address->city 	 	  = $request->city;
			$address->province	  = $request->province;
			$address->country 	  = $request->country;
			$address->postal_code = $request->postal_code;
			User::find(Auth::id())->profile()->save($address);
		}

		Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Thank you! We will send your books after confirming your purchase."
        ]);

        return redirect('/');
	}

	/**
	 * Store orders.
	 * @param UpdateProfileRequest
	 */
	public function storeOrderUpdateProfile(Request $request, $id)
	{
		if ($request->plan == "PACKAGE") {
			$this->validate($request, [
				'phone'       => 'required|unique:profiles,phone,' . $id,
	            'street'      => 'required',
	            'city'        => 'required',
	            'province'    => 'required',
	            'country'     => 'required',
	            'postal_code' => 'required|numeric'
			]);
		}

		$cart_content = Cart::instance('shopping')->content();
		
		$transaction  = new Order;
		$transaction->user_id  = Auth::id();
		$transaction->subtotal = "Rp ".Cart::subtotal(2, ',', '.');
		$transaction->tax      = "Rp ".Cart::tax(2, ',', '.');
		$transaction->invoice  = $request->invoice;
		$transaction->save();

		foreach ($cart_content as $cart) {
			$orders = new Item;
			$orders->book_id     = $cart->id;
			$orders->qty 	     = $cart->qty;
			$orders->total_price = $cart->price * $cart->qty;
			$transaction->items()->save($orders);
		}

		Cart::destroy();

		if ($request->plan == "PACKAGE") {
			$address = Profile::find($id);
			$address->phone		  = $request->phone;
			$address->street 	  = $request->street;
			$address->city 	 	  = $request->city;
			$address->province	  = $request->province;
			$address->country 	  = $request->country;
			$address->postal_code = $request->postal_code;
			$address->save();
		}

		Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Thank you! We will send your books after confirming your purchase."
        ]);

        return redirect('/');
	}
}
