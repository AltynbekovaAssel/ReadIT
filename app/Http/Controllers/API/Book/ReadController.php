<?php

namespace App\Http\Controllers\API\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookOrder;
use Illuminate\Http\Request;

class ReadController extends Controller
{
    public function __invoke(Book $book)
    {
        BookOrder::create([
            'user_id' => auth()->user()->id,
            'book_id' => $book->id,
            'type' => 1,
            'back' => now()->addDays(7),
        ]);
    }
}
