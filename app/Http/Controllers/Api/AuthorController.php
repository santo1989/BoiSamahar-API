<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends BaseController
{
    public function index()
    {
        $authors = Author::all();
        return $this->sendResponse($authors, 'Authors retrieved successfully.');
    }

    public function store(Request $request)
    {

        $authors = Author::all();
        $book = Book::all();
        // Data insert
        $author = new Author;
        $author->name = $request->name;
        if ($book == null || $book->count() == 0 || isset($authors->books) == null) {
            $author->number_of_book = 0;
        } else {
            $author->number_of_book = $authors->books->count();
        }
        $author->save();

        return $this->sendResponse($author->toArray(), 'Author created successfully.');
    }

    public function show($id)
    {
        $author = Author::find($id);

        if (is_null($author)) {
            return $this->sendError('Author not found.');
        }

        return $this->sendResponse($author->toArray(), 'Author retrieved successfully.');
    }

    public function update(Request $request, Author $author)
    {
        $input = $request->all();

        $author->name = $input['name'];
        $author->save();

        return $this->sendResponse($author->toArray(), 'Author updated successfully.');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return $this->sendResponse($author->toArray(), 'Author deleted successfully.');
    }
}
