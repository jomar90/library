<?php

namespace App\Http\Controllers;

use App\Exceptions\BookNotBorrowedException;
use App\Exceptions\BookUnavailableException;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BorrowingController extends Controller
{
    public function index()
    {
        $books = Book::with('borrowings', 'publisher')->paginate(5);
        return view('books.index', compact('books'));
    }

    public function borrow(Book $book)
    {
        if ($book->isBorrowed()) {

            Log::warning('Borrow failed: book already borrowed', [
                'book_id' => $book->id,
                'user_id' => auth()->id()
            ]);

            throw new BookUnavailableException();
        }

        $book->borrowings()->create([
            'user_id' => auth()->id(),
            'borrow_date' => now(),
            'return_date' => null
        ]);

        Log::info('Book borrowed successfully', [
            'book_id' => $book->id,
            'user_id' => auth()->id()
        ]);

        return back()->with('success', 'Book borrowed.');
    }

    public function return(Book $book)
    {
        $borrowing = $book->borrowings()
            ->whereNull('return_date')
            ->first();

        if (!$borrowing) {

            Log::warning('Return failed: book not borrowed', [
                'book_id' => $book->id,
                'user_id' => auth()->id()
            ]);

            throw new BookNotBorrowedException();
        }

        $borrowing->update([
            'return_date' => now()
        ]);

        Log::info('Book returned successfully', [
            'book_id' => $book->id,
            'user_id' => auth()->id()
        ]);

        return back()->with('success', 'Book returned.');
    }
}
