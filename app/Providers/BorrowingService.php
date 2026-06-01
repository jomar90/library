<?php

namespace App\Providers;

use App\Exceptions\BookNotBorrowedException;
use App\Exceptions\BookUnavailableException;
use App\Models\Book;
use Illuminate\Support\Facades\Log;

class BorrowingService
{
    public function borrow(Book $book, int $userId): void
    {
        if ($book->isBorrowed()) {
            Log::warning('Borrow failed: book already borrowed', [
                'book_id' => $book->id,
                'user_id' => $userId,
            ]);

            throw new BookUnavailableException;
        }

        $book->borrowings()->create([
            'user_id' => $userId,
            'borrow_date' => now(),
            'return_date' => null,
        ]);

        Log::info('Book borrowed successfully', [
            'book_id' => $book->id,
            'user_id' => $userId,
        ]);
    }

    public function return(Book $book, int $userId): void
    {
        $borrowing = $book->borrowings()
            ->whereNull('return_date')
            ->first();

        if (! $borrowing) {
            Log::warning('Return failed: book not borrowed', [
                'book_id' => $book->id,
                'user_id' => $userId,
            ]);

            throw new BookNotBorrowedException;
        }

        $borrowing->update([
            'return_date' => now(),
        ]);

        Log::info('Book returned successfully', [
            'book_id' => $book->id,
            'user_id' => $userId,
        ]);
    }
}
