<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::latest()->paginate(5);
        return view('publishers.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show(Publisher $publisher)
    {
        return view('publishers.show', compact('publisher'));
    }

    public function store(Publisher $publisher)
    {
        request()->validate([
            'name' => 'required',
            'min:3',
            'email' => 'required',
            'email',
            // 'unique:publishers,email',
        ]);

        Publisher::create([
            'name' => request('name'),
            'email' => request('email'),
            'website' => request('website')
        ]);


        return redirect('/publishers')
            ->with('success', 'Publisher created successfully.');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        return view('publishers.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        request()->validate([
            'name' => 'required',
            'min:3',
            'email' => 'required',
            'email',
            // 'unique:publishers,email,' . $publisher->id
        ]);

        $publisher->update([
            'name' => request('name'),
            'email' => request('email'),
            'website' => request('website')
        ]);

        return redirect('/publishers')
            ->with('success', 'Publisher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect('/publishers')
            ->with('success', 'Publisher deleted successfully.');
    }
}
