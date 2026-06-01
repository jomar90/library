<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ExternalBookController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->query('query');

        if (!$query) {
            return response()->json([
                'message' => 'Query parameter is required'
            ], 422);
        }

        $response = Http::get('https://openlibrary.org/search.json', [
            'q' => $query
        ]);

        if (!$response->successful()) {
            return response()->json([
                'message' => 'External API failed'
            ], 500);
        }

        $data = $response->json();

        return response()->json([
            'query' => $query,
            'count' => $data['numFound'] ?? 0,
            'books' => collect($data['docs'] ?? [])->take(10)->map(function ($book) {
                return [
                    'title' => $book['title'] ?? null,
                    'author' => $book['author_name'][0] ?? null,
                    'year' => $book['first_publish_year'] ?? null,
                ];
            })
        ]);
    }
}
