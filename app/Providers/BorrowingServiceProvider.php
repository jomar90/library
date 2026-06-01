<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BorrowingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(BorrowingService::class);
    }

    public function boot(): void
    {
        //
    }
}
