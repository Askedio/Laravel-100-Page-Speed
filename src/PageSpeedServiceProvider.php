<?php

namespace Askedio\Laravel100PageSpeed;

use Illuminate\Support\ServiceProvider;

class PageSpeedServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
public function boot(\Illuminate\Routing\Router $router, \Illuminate\Contracts\Http\Kernel $kernel) {
    $kernel->prependMiddleware(\Askedio\Laravel100PageSpeed\Http\Middleware\Minify::class);
    $kernel->pushMiddleware(\Askedio\Laravel100PageSpeed\Http\Middleware\Minify::class);
    $router->middleware('minify', \Askedio\Laravel100PageSpeed\Http\Middleware\Minify::class);

    if (! $this->app->routesAreCached()) {
        require __DIR__.'/routes.php';
    }
}


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
