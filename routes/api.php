<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\CategoryController;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::apiResource('categories', CategoryController::class);

Route::get('categories/search/{id}', function ($id) {
    $books = Book::where('category_id', $id)->get();

    // foreach ($books as $book) {
    //     $book->download_link = url('storage/books/' . $book->download_link);
    // }
    foreach ($books as $book) {
        $book->download_link = url($book->download_link);
    }
    // $number_of_books=Category::find($id)->number_of_books = $books->count();
    foreach ($books as $book) {
        $book->author = Author::find($book->author_id);

        // $authors = Book::where('author_id', $id)->count();
    }
    // $number_of_books = Book::where('author_id', $id)->count();
        $response = [
            'success' => true,
            'data'    => $books, 
            // 'number_of_books' =>$authors,
            'message' => ' search by categories of Books retrieved successfully.',
        ];


        return response()->json($response, 200);

    
});

Route::apiResource('books', BookController::class);

Route::apiResource('authors', AuthorController::class);

Route::get('books/search/author/{author_id}', function ($id) {
    $books = Book::where('author_id', $id)->get();
    foreach ($books as $book) {
        $book->download_link = url($book->download_link);
        // $book->download_link = url('storage/books/' . $book->download_link);
    }

    $response = [
        'success' => true,
        'data'    => $books,
        'message' => ' search by authors of Books retrieved successfully.',
    ];


    return response()->json($response, 200);
});


Route::get('books/search/category/author_name/{category_id}', function ($id) {
    // $books = Book::where('category_id', $id)->author_name;
    $books = Book::where('category_id', $id)->get()->groupBy('author_name');
  

    $response = [
        'success' => true,
        'data'    => $books,
        'message' => ' search by id of Books retrieved successfully.',
    ];

    return response()->json($response, 200);
});

Route::get('books/search/book_name/{name}', function ($name) {
    $books = Book::where('name', $name)->get();
    foreach ($books as $book) {
        $book->download_link = url($book->download_link);
        // $book->download_link = url('storage/books/' . $book->download_link);
    }

    $response = [
        'success' => true,
        'data'    => $books,
        'message' => ' search by name of Books retrieved successfully.',
    ];

    return response()->json($response, 200);
}); 

Route::get('books/search/author_name/{author_name}', function ($author_name) {
    $books = Book::where('author_name', $author_name)->get();
    foreach ($books as $book) {
        $book->download_link = url($book->download_link);
        // $book->download_link = url('storage/books/' . $book->download_link);
    }

    $response = [
        'success' => true,
        'data'    => $books,
        'message' => ' search by author of Books retrieved successfully.',
    ];

    return response()->json($response, 200);
});

Route::get('books/search/category_name/{category_name}', function ($category_name) {
    $books = Book::where('category_name', $category_name)->get();
    foreach ($books as $book) {
        $book->download_link = url($book->download_link);
        // $book->download_link = url('storage/books/' . $book->download_link);
    }

    $response = [
        'success' => true,
        'data'    => $books,
        'message' => ' search by category of Books retrieved successfully.',
    ];

    return response()->json($response, 200);
});

Route::get('auther_book_search_by_category_name/{category_id}/{author_id}', function ($category_name,$author_id) {
    $books = Book::where('category_id', $category_name)->where('author_id', $author_id)->get();
    foreach ($books as $book) {
        $book->download_link = url($book->download_link);
        // $book->download_link = url('storage/books/' . $book->download_link);
    }

    $response = [
        'success' => true,
        'data'    => $books,
        'message' => ' search by category of Books retrieved successfully.',
    ];

    return response()->json($response, 200);
});




// Route::get('books/search/{description}', function ($description) {
//     $books = Book::where('description', $description)->get();
//     foreach ($books as $book) {
//         $book->download_link = url('storage/books/' . $book->download_link);
//     }

//     $response = [
//         'success' => true,
//         'data'    => $books,
//         'message' => ' search by description of Books retrieved successfully.',
//     ];

//     return response()->json($response, 200);
// });

// Route::apiResource('categories', CategoryController::class)->middleware('auth:sanctum');
// Route::get('categories/search/{id}', function ($id) {
//     return Book::where('category_id', $id)->get();
    
// })->middleware('auth:sanctum');
// Route::apiResource('books', BookController::class)->middleware('auth:sanctum');