<?php

namespace DanieleTulone\PostmanGenerator;

use DanieleTulone\PostmanGenerator\Commands\ExportPostmanCommand;
use DanieleTulone\PostmanGenerator\Contracts\PostmanServiceContract;
use DanieleTulone\PostmanGenerator\Services\PostmanService;
use Illuminate\Support\ServiceProvider;

class PostmanGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/api-postman.php' => config_path('api-postman.php'),
            ], 'postman-config');
        }

        $this->commands(ExportPostmanCommand::class);

        $this->app->bind(
            PostmanServiceContract::class,
            PostmanService::class
        );

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/api-postman.php',
            'api-postman'
        );
    }
}
