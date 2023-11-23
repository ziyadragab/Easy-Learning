<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\AttachGroupByUserObserver;
use Illuminate\Support\ServiceProvider;

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
        User::observe(AttachGroupByUserObserver::class);
    }
}
