<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends BaseController
{
    public function index()
    {
        $books = Book::all();
       // $books->download_link = $this->getDownloadLink($books);
        return $this->sendResponse($books, 'Books retrieved successfully.');
    }

    public function store(Request $request)
    {
        $category_name = Category::where('id', $request->category_id)->get();
        $author_name = Author::where('id', $request->author_id)->get();
        $input = [
            'name' => $request->name,
            'details' => $request->details,
            'category_id' => $request->category_id,
            'category_name' => $category_name[0]->name,
            'author_id' => $request->author_id,
            'author_name' => $author_name[0]->name,
            // 'download_link' => $this->uploadpdf(request()->file('download_link')),
            'download_link' => $request->download_link,
        ];

        $book = Book::create($input);

        Category::where('id', $request->category_id)->increment('number_of_book');

        Author::where('id', $request->author_id)->increment('number_of_book');

        return $this->sendResponse($book->toArray(), 'Book created successfully.');
    }

    public function show($id)
    {
        $book = Book::find($id);

        if (is_null($book)) {
            return $this->sendError('Book not found.');
        }

        return $this->sendResponse($book->toArray(), 'Book retrieved successfully.');
    }

    public function update(Request $request, Book $book)
    {
        $category_name = Category::where('id', $request->category_id)->get('name');
        $author_name = Author::where('id', $request->author_id)->get('name');
        $input = [
            'name' => $request->name,
            'details' => $request->details,
            'category_id' => $request->category_id,
            'category_name' => $category_name,
            'author_id' => $request->author_id,
            'author_name' => $author_name,
            'download_link' => $request->download_link,
        ];
        // if ($request->hasFile('download_link')) {
        //     $download_link = $request->file('download_link');
        //     $name = $download_link->getClientOriginalName() . '-' . time() .
        //         '.' . $download_link->getClientOriginalExtension();
        //     $destinationPath = storage_path('/app/public/books/');
        //     $download_link->move($destinationPath, $name);
        //     $book->download_link = $name;
        // }
        $book->update($input);


        return $this->sendResponse($book->toArray(), 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book = Book::find($book->id);
        // $url = storage_path('/app/public/books/' . $book->download_link);
        // if (file_exists($url)) {
        //     unlink($url);
        // }
        $book->delete();
        $book->category->decrement('number_of_book');
        $book->author->decrement('number_of_book');

        return $this->sendResponse($book->toArray(), 'Book deleted successfully.');
    }

    // public function uploadpdf($file)
    // {
    //     $name = $file->getClientOriginalName() . '-' . time() .
    //         '.' . $file->getClientOriginalExtension();
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
