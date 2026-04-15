<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Book;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Book::class);
    }

    public function rules(): array
    {
        return [
            'title' => 'required|min:3|unique:books,title',
            'author' => 'required|min:1',
            'pages' => 'required|integer|min:1',
            'publication_year' => 'nullable|integer',
            'publisher_id' => 'required|exists:publishers,id',
        ];
    }
}
