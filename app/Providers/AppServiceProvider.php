<?php

namespace App\Providers;

use App\interfaces\ILuckyTicketRepository;
use App\interfaces\ILuckyTicketService;
use App\repositories\LuckyTicketRepository;
use App\services\LuckyTicketService;
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
        $this->app->bind(ILuckyTicketRepository::class, LuckyTicketRepository::class);
        $this->app->bind(ILuckyTicketService::class, LuckyTicketService::class);

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
