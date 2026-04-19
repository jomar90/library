<?php

namespace Tests\Unit;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_book_is_borrowed_when_active_borrowing_exists()
    {
        $book = Book::factory()->create();

        Borrowing::factory()->create([
            'book_id' => $book->id,
            'return_date' => null,
        ]);

        $this->assertTrue($book->isBorrowed());
    }

    public function test_book_is_not_borrowed_when_all_borrowings_are_returned()
    {
        $book = Book::factory()->create();

        Borrowing::factory()->create([
            'book_id' => $book->id,
            'return_date' => now(),
        ]);

        $this->assertFalse($book->isBorrowed());
    }
}
