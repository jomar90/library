<?php

namespace App\Exceptions;

use Exception;

class BookUnavailableException extends Exception
{
    public function render($request)
    {
        return response()->view('errors.book-unavailable', [], 400);
    }
}
