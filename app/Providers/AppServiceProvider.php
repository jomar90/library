<?php

namespace App\Providers;

use App\Events\BookCreatedEvent;
use App\Listeners\SendBookCreatedMail;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(); {
            Event::listen(
                BookCreatedEvent::class,
                SendBookCreatedMail::class,
            );

            // Gate::define('update-book', function (User $user, Book $book) {
            //     return $user->id === $book->user_id;
            // });
        }
    }
}
