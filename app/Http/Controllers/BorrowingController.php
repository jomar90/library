<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Providers\BorrowingService;

class BorrowingController extends Controller
{
    public function __construct(
        private BorrowingService $borrowingService
    ) {}

    public function index()
    {
        $books = Book::with('borrowings', 'publisher')->paginate(5);

        return view('books.index', compact('books'));
    }

    public function borrow(Book $book)
    {
        $this->borrowingService->borrow($book, auth()->id());

        return back()->with('success', 'Book borrowed.');
    }

    public function return(Book $book)
    {
        $this->borrowingService->return($book, auth()->id());

        return back()->with('success', 'Book returned.');
    }
}
