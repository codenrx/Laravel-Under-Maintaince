<?php

namespace codenrx\maintaince;

use Illuminate\Support\ServiceProvider;

class maintainceServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'maintaince');
        // $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->commands([
            App\Commands\maintainceCommand::class
        ]);

        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/maintaince'),
            __DIR__ . '/config/maintaince.php' => config_path('maintaince.php'),
            __DIR__ . '/public/css' => public_path('maintaince/css'),
            __DIR__ . '/public/images' => public_path('maintaince/images'),
        ]);
        $this->app['router']->aliasMiddleware('maintaince-middleware', \codenrx\maintaince\App\Http\Middleware\maintainceWare::class);
    }

    public function register()
    {
        # code...
    }
}
