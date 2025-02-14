<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Http\Middleware\JwtMiddleware;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__.'/../routes/api.php',
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(StartSession::class);
        $middleware->append(ShareErrorsFromSession::class);
    //     $middleware->api(prepend:
    //         [JwtMiddleware::class]
    // );

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
