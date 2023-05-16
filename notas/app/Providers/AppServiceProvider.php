<?php

namespace App\Providers;

use App\Interfaces\NotasInterface;
use App\Models\Notas;
use App\Repositories\NotasRepository;
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
        $repositories = [
            NotasInterface::class => NotasRepository::class,
        ];

        foreach ($repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
            $this->app->bind($interface, function ($app) use ($implementation) {
                $modelClass = $implementation::getModelClass();
                $model = new $modelClass();
                return new $implementation($model);
            });
        }
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
