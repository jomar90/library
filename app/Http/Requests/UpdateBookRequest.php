<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use function Symfony\Component\Translation\t;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'min:1',
                Rule::unique('books', 'title')->ignore($this->book),
            ],
            'author' => 'required|string|min:1',
            'publication_year' => 'required|integer|min:1',
            'pages' => 'required|integer|min:1',
            'publisher_id' => 'required|exists:publishers,id',
        ];
    }
}
