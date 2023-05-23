<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Category;
use Livewire\Component;

class ShowCategory extends Component
{
    public $books;
    public $category_id;
    public $categories;

    public function mount()
    {
        $this->books = Book::all();
        $this->category_id = 0;
        $this->categories = Category::all();
    }

    public function category($newCategory)
    {
        if ($newCategory == 0) {
            $this->books = Book::all();
        } else {
            $this->books = Book::where('category_id', $newCategory)->get();
        }
        $this->category_id = $newCategory;
    }

    public function render()
    {
        return view('livewire.show-category',
            [
                'books' => $this->books,
                'category_id' => $this->category_id,
                'categories' => $this->categories,
            ]
        );
    }
}
