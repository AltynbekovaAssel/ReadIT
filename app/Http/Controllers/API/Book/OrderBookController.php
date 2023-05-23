<?php

namespace App\Http\Controllers\API\Book;

use App\Http\Controllers\Controller;
use App\Models\BookOrder;
use Illuminate\Http\Request;

class OrderBookController extends Controller
{
    public function __invoke(Request $request)
    {
        $book = BookOrder::create([
            'user_id' => auth()->user()->id,
            'book_id' => $request->book_id,
            'type' => $request->type,
        ]);
        return response()->json($book);
    }
}
