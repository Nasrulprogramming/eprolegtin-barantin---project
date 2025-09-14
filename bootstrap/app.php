<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Facade;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )


    ->withMiddleware(function ($middleware) {
        $middleware->append(\App\Http\Middleware\SetLocale::class);
    })

    ->withMiddleware(function ($middleware) {
        $middleware->alias([
            'auth' => \App\Http\Middleware\Authenticate::class,
        ]);
    })

    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'superadmin' => \App\Http\Middleware\SuperAdminMiddleware::class,
        ]);
    })





    ->withExceptions(function ($exceptions) {
        //
    })->create();
