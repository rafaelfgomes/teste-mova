<?php

namespace App\Providers;

use App\Interfaces\MailServiceContract;
use App\Service\MessageService;
use App\Strategy\MessageStrategy;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\MessageServiceContract;
use App\Interfaces\MessageStrategyContract;
use App\Service\MailService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MessageServiceContract::class, MessageService::class);
        $this->app->bind(MessageStrategyContract::class, MessageStrategy::class);
        $this->app->bind(MailServiceContract::class, MailService::class);
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
