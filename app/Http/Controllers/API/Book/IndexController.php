<?php

namespace App\Http\Controllers\API\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;

class IndexController extends Controller
{
    public function __invoke()
    {
        $books = Book::all();

        return response()->json($books);
    }
}
