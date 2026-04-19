<?php

namespace App\Exceptions;

use Exception;

class BookNotBorrowedException extends Exception
{
    public function render($request)
    {
        return response()->view('errors.book-not-borrowed', [], 400);
    }
}
