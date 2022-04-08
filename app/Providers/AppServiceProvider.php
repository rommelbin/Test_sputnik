<?php

namespace App\Providers;

use App\interfaces\ILuckyNumberRepository;
use App\interfaces\ILuckyNumberService;
use App\repositories\LuckyNumberRepository;
use App\services\LuckyNumberService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ILuckyNumberRepository::class, LuckyNumberRepository::class);
        $this->app->bind(ILuckyNumberService::class, LuckyNumberService::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
