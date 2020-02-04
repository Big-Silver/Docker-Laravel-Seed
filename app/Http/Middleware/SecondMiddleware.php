<?php

namespace App\Http\Middleware;
use Closure;

class SecondMiddleware {
   public function handle($request, Closure $next) {
      echo '<br>Second Middleware';
      return $next($request);
   }
}