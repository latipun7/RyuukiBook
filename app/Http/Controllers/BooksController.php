<?php

namespace App\Http\Controllers;

use Session;
use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::orderBy('id','desc')->paginate(5);
        return view('books.index')->with(compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $category = new Category;
        // return view('categories.create')->with(compact('category'));;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, ['name' => 'required|unique:categories']);

        // $category = Category::create($request->all());

        // Session::flash("flash_notification", [
        //     "level"=>"success",
        //     "message"=>"Success! $category->name category created."
        // ]);

        // return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $category = Category::find($id);
        // return view('categories.edit')->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, ['name' => 'required|unique:categories,name,'. $id]);

        // $category = Category::find($id);
        // $category->update($request->only('name'));

        // Session::flash("flash_notification", [
        //     "level"=>"success",
        //     "message"=>"Success! $category->name category saved."
        // ]);

        // return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Category::destroy($id);

        // Session::flash("flash_notification", [
        //     "level"=>"success",
        //     "message"=>"Category deleted."
        // ]);

        // return redirect()->route('categories.index');
    }
}
