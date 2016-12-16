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
        $category = Book::find(1)->category->pluck('name','id')->all(); 
        $book     = new Book;
        return view('books.create')->with(compact('category','book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required|unique:books,title',
            'category'    => 'required|exists:categories,id',
            'desc'        => 'required',
            'author'      => 'required',
            'publisher'   => 'required',
            'price'       => 'required|numeric',
            'cover'       => 'image|mimes:jpeg,png,bmp,gif,svg|max:2048'
        ]);

        $book = Book::create([
            'title'       => $request->title,
            'category_id' => $request->category,
            'desc'        => $request->desc,
            'author'      => $request->author,
            'publisher'   => $request->publisher,
            'price'       => $request->price
        ]);

        // fill field cover if cover uploaded
        if ($request->hasFile('cover')) {
            // Take uploaded file
            $uploaded_cover = $request->file('cover');

            // take extension file
            $extension = $uploaded_cover->getClientOriginalExtension();

            // create random file name with extension
            $filename = md5(time()) . '.' . $extension;

            // save cover in folder 'images/book_covers/'
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images/book_covers';
            $uploaded_cover->move($destinationPath, $filename);

            // fill cover field with created filename
            $book->cover = $filename;
            $book->save();
        }

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Success! $book->title added."
        ]);

        return redirect()->route('books.index');
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
