<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $book_orders = BookOrder::with(['book', 'user'])->where('status', 0)->get();
        $books = Book::all();
        return view('home')
            ->with(compact('book_orders'))
            ->with(compact('books'));
    }

    public function show(Book $book)
    {
        return view('single')
            ->with(compact('book'));
    }

    public function profile()
    {
        $e_count = 0;
        $b_count = 0;
        $user = Auth::user();
        $book_orders = BookOrder::with('book')->where('user_id', $user->id)->get();
        foreach ($book_orders as $item) {
            if ($item->type == 1) {
                $e_count += 1;
            } else {
                $b_count += 1;
            }
        }

        return view('profile')
            ->with(compact('user'))
            ->with(compact('book_orders'))
            ->with(compact('e_count'))
            ->with(compact('b_count'));
    }

    public function search(Request $request)
    {
        $books = Book::where('name', 'LIKE', '%' . $request->search . '%')->get();
        return view('search')
            ->with(compact('books'));
    }

    public function profile_update(Request $request)
    {
        auth()->user()->update([
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return redirect()->route('profile.index');
    }

    public function read(Book $book)
    {
        BookOrder::create([
            'user_id' => auth()->user()->id,
            'book_id' => $book->id,
            'type' => 1,
            'back' => Carbon::now()->addDays(100),
        ]);
        $book_url = Book::where('id', $book->id)->first()->url;
        return redirect()->to($book_url);
    }

    public function availability(Book $book)
    {
        if ($book->count == 0) {
            return redirect()->route('profile.index');
        }
        $book->count--;
        $book->save();
        BookOrder::create([
            'user_id' => auth()->user()->id,
            'book_id' => $book->id,
            'type' => 2,
            'back' => now()->addDays(7),
        ]);
        return redirect()->route('profile.index');
    }

    public function reciver(BookOrder $bookOrder)
    {
        $bookOrder->update([
            'back' => now()->addDays(7),
            'status' => 1,
        ]);
        $bookOrder->save();
        return redirect()->back();
    }
}
