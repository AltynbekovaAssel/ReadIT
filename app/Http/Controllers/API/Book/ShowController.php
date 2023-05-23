<?php

namespace App\Http\Controllers\API\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;

class ShowController extends Controller
{
    public function __invoke($book)
    {
        $book = Book::where('id', $book)->first();

        if (!$book) {
            return response()->json([
                'status' => '404',
                'message' => 'Not found'
            ], 404);
        }


        return response()->json($book);
    }
}
