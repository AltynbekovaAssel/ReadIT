<?php

namespace App\Http\Controllers\API\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookOrder;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function __invoke(Book $book)
    {
        if ($book->count == 0) {
            return response()->json(['status' => false]);
        }

        $book->count--;
        $book->save();

        BookOrder::create([
            'user_id' => auth()->user()->id,
            'book_id' => $book->id,
            'type' => 2,
            'back' => now()->addDays(7),
        ]);

        return response()->json(['status' => true]);
    }
}
