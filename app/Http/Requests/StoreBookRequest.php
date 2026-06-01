<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|unique:books,title',
            'author' => 'required|min:1',
            'pages' => 'required|integer|min:1',
            'publication_year' => 'required|integer',
            'publisher_id' => 'required|exists:publishers,id',
        ];
    }
}
