<?php

namespace App\Http\Controllers;

use App\Mail\BookCreated;
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
    public function store()
    {
        request()->validate([
            'title' => 'required|min:1',
            'author' => 'required|min:1',
            'pages' => 'required|integer|min:1'
        ]);

        Book::create([
            'title' => request('title'),
            'author' => request('author'),
            'publication_year' => request('publication_year'),
            'pages' => request('pages'),
            'publisher_id' => request('publisher_id'),
        ]);

        // Mail::to($book->publisher->user)->queue(
        //     new BookCreated($book)
        // );

        return redirect('/books')
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
        Gate::authorize('update-book', $book);

        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Book $book)
    {
        // Gate::authorize('edit-book', $book);

        request()->validate([
            'title'  => 'required|string|min:1',
            'author' => 'required|string|min:1',
            'publication_year' => 'required|integer|min:1',
            'pages'  => 'required|integer|min:1',
        ]);

        $book->update([
            'title' => request('title'),
            'author' => request('author'),
            'publication_year' => request('publication_year'),
            'pages' => request('pages'),
        ]);

        return redirect('/books/' . $book->id)
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        Gate::authorize('delete-book', $book);

        $book->delete();

        return redirect('/books')
            ->with('success', 'Book deleted successfully.');
    }
}
