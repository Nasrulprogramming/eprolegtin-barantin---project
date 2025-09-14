<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // ambil locale dari session, default 'id'
        $locale = Session::get('locale', config('app.locale', 'id'));
        App::setLocale($locale);

        return $next($request);
    }
}
