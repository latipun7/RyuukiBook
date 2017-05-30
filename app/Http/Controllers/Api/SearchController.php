<?php

namespace App\Http\Controllers\Api;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $req)
    {
    	$error = ['error'=>'No result found.'];

    	if ($req->has('q')) {
    		$books = Book::search($req->get('q'))->paginate(4);

    		// return $books->count() ? $books : $error;
            return view('layouts\search')->with(compact('books'));
    	} 
        else {
    		$books = Book::latest()->paginate(4);
    		return view('layouts\search')->with(compact('books'));
    	}
    }
}
