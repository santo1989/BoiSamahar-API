<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::all();
        $books->download_link = $this->getDownloadLink($books);
        return view( 'backend.home', compact('books'));
    }
    public function getDownloadLink($books)
    {
        foreach ($books as $book) {
            $book->download_link = url('storage/books/' . $book->download_link);
        }
        return $books;
    }

  
}
