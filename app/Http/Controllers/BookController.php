<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        $books->download_link = $this->getDownloadLink($books);
         return view('backend.books.index', compact('books'));
    }


    public function create()
    {
        $books = Book::all();
        $categories = Category::all();
        $authors = Author::all();
        return view('backend.books.create', compact('books', 'categories', 'authors'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|min:3|max:191',
            'download_link' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
        ]);
        try {
            $category_name = Category::where('id', $request->category_id)->get();
            $author_name = Author::where('id', $request->author_id)->get();
            Book::create([
                'name' => $request->name,
                'details' => $request->details,
                // 'download_link' => $this->uploadpdf(request()->file('download_link')),
                'download_link' => $request->download_link,
                'category_id' => $request->category_id,
                'category_name'=> $category_name[0]->name,
                'author_id' => $request->author_id,
                'author_name' => $author_name[0]->name,
            ]);
            
            Category::where('id', $request->category_id)->increment('number_of_book');

            Author::where('id', $request->author_id)->increment('number_of_book');


            

            return redirect()->route('books.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }

    }

 
    public function show($id)
    {
        $book = Book::find($id);
        return view('backend.books.show', compact('book'));
        
    }

  
    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::all();
        $authors = Author::all();
        return view('backend.books.edit', compact('book', 'categories', 'authors'));
    }

   
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        try {
            $category_name = Category::where('id', $request->category_id)->get();
            $author_name = Author::where('id', $request->author_id)->get();
            $requestData = [
                'name' => $request->name,
                'details' => $request->details,
                'download_link' =>$request->download_link,
                'category_id' => $request->category_id,
                'category_name' => $category_name[0]->name,
                'author_id' => $request->author_id,
                'author_name' => $author_name[0]->name,
                'download_link' => $request->download_link,
            ];

            // if ($request->hasFile('download_link')) {
            //     $download_link = $request->file('download_link');
            //     $name
            //     = $download_link->getClientOriginalName() . '-' . time() .
            //     '.' . $download_link->getClientOriginalExtension();
            //     $destinationPath = storage_path('/app/public/books/');
            //     $download_link->move($destinationPath, $name);
            //     $book->download_link = $name;
            // }

            $book->update($requestData);

            return redirect()->route('books.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }


    public function destroy($id)
    {
        $book = Book::find($id);
        // $unlink = storage_path('app/public/books/' . $book->download_link);
        // if (file_exists($unlink)) {
        //     unlink($unlink);
        // }
        $book->delete();

        $book->category->decrement('number_of_book');
        $book->author->decrement('number_of_book');

        // Redirect
        return redirect()->route('books.index');
    }

    // public function uploadpdf($file)
    // {
    //     $name
    //     = $file->getClientOriginalName() . '-' . time() .
    //     '.' . $file->getClientOriginalExtension();
    //     $destinationPath = storage_path('/app/public/books/');
    //     $file->move($destinationPath, $name);
    //     return $name;
    // }

    public function getDownloadLink($books)
    {
        foreach ($books as $book) {
            $book->download_link = url($book->download_link);
        }
        return $books;
        // foreach ($books as $book) {
        //     $book->download_link = url('storage/books/' . $book->download_link);
        // }
        // return $books;
    }
}
