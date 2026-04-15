<?php

namespace App\Http\Controllers;

use App\Events\BookCreatedEvent;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('index');
        $books = Book::with('publisher')->latest()->paginate(5);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create', [
            'publishers' => Publisher::all()
        ]);
    }

    public function show(Book $book)
    {

        return view('books.show', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {

        $book = Book::create([
            ...$request->validated(),
            'user_id' => auth()->id()
        ]);


        event(new BookCreatedEvent($book));

        return redirect()->route('books.index')
            ->with('success', 'Book added successfully.');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', [
            'book' => $book,
            'publishers' => Publisher::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->validated());

        return redirect('/books/' . $book->id)
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        Gate::authorize('delete', $book);

        $book->delete();

        return redirect('/books')
            ->with('success', 'Book deleted successfully.');
    }
}
