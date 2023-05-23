<?php

namespace App\Http\Controllers\API\Book;

use App\Http\Controllers\Controller;
use App\Models\BookOrder;
use Illuminate\Http\Request;

class MyBookController extends Controller
{
    public function __invoke()
    {
        $user_id = auth()->user()->id;
        $books = BookOrder::with('book')->where('user_id', $user_id)->get();
        return response()->json($books);
    }
}
