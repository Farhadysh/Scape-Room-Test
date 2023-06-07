<?php

namespace App\Providers;

use App\Interfaces\ScapeRoomInterface;
use App\Repositories\ScapeRoomRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ScapeRoomInterface::class, ScapeRoomRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(151);
    }
}
