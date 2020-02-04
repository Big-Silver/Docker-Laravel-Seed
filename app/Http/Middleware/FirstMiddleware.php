<?php

namespace App\Http\Middleware;
use Closure;

class FirstMiddleware {
    public function handle($request, Closure $next) {
        echo '<br>First Middleware';
        return $next($request);
    }
}