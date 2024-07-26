<?php

namespace App\Providers;

// use Illuminate\Support\ServiceProvider;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{   

    public const HOME = '/home';

    protected $namespace = 'App\Http\Controllers';
    protected $api_namespace = 'App\Api\Controllers';
    protected $admin_namespace = 'App\Http\Controllers\Admin';
    protected $HOME = 'admin/dashboard';


    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(120)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->api_namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::prefix('admin')
                ->middleware('api')
                ->namespace($this->admin_namespace)
                ->group(base_path('routes/admin.php'));
        });
    }
}
