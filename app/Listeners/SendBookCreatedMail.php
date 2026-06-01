<?php

namespace App\Listeners;

use App\Events\BookCreatedEvent;
use App\Mail\BookCreatedMail;
use Illuminate\Support\Facades\Mail;

class SendBookCreatedMail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BookCreatedEvent $event): void
    {
        Mail::to($event->book->user)->send(
            new BookCreatedMail($event->book)
        );
    }
}
