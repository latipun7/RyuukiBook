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
    		$books = Book::search($req->get('q'))->get();

    		return $books->count() ? $books : $error;
    	} else {
    		$books = Book::all();
    		return view('layouts\search')->withBook($books);
    	}
    }
}
