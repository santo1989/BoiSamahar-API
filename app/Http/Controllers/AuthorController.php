<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
   
    public function index()
    {
        $authors = Author::all();
        return view('backend.authors.index', compact('authors'));
    }

   
    public function create()
    {

        return view('backend.authors.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:191',
        ]);

        $authors = Author::all();
        $book = Book::all();
        // Data insert
        $author = new Author;
        $author->name = $request->name;
        if($book == null || $book->count() ==0 || isset($authors->books) == null){
            $author->number_of_book = 0;
        } else {
            $author->number_of_book = $authors->books->count();
        }
        $author->save();

        // Redirect
        return redirect()->route('authors.index');
    }

   
    public function show(Author $author)
    {
        return view('backend.authors.show', compact('author'));
    }

  
    public function edit(Author $author)
    {
        return view('backend.authors.edit', compact('author'));
    }

 
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|min:3|max:191',
        ]);

        $authors = Author::all();
        $book = Book::all();
        // Data insert
        $author->name = $request->name;
        if($book == null || $book->count() ==0 || isset($authors->books) == null){
            $author->number_of_book = 0;
        } else {
            $author->number_of_book = $authors->books->count();
        }
        $author->save();

        // Redirect
        return redirect()->route('authors.index');

    }

 
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $authors = Author::where('name', 'like', '%'.$search.'%')->get();
        return view('backend.authors.index', compact('authors'));
    }

}
