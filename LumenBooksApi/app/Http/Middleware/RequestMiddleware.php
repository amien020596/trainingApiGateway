<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class RequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $secretApp = explode(',', env('APP_BOOKS_SECRET_KEY'));
        if (in_array($request->header('Authorization'), $secretApp)) {
            return $next($request);
        }
        abort(Response::HTTP_UNAUTHORIZED);
    }
}
