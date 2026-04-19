<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BorrowBookTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_can_borrow_a_book()
    {
        /**
         * @var User $user
         */
        $user = User::factory()->create();
        $book = Book::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('books.borrow', $book));

        $response->assertSessionHas('success', 'Book borrowed.');

        $this->assertDatabaseHas('borrowings', [
            'book_id' => $book->id,
            'user_id' => $user->id,
        ]);
    }

    public function test_user_cannot_borrow_already_borrowed_book()
    {
        /**
         * @var User $user
         */
        $user = User::factory()->create();
        $book = Book::factory()->create();

        // existing borrowing (not returned)
        Borrowing::factory()->create([
            'book_id' => $book->id,
            'return_date' => null,
        ]);

        $this->actingAs($user);

        $response = $this->post(route('books.borrow', $book));

        $response->assertSessionHas('error', 'Book already borrowed.');

        // ensure no extra borrowing created
        $this->assertEquals(1, Borrowing::count());
    }
}
