<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiLangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $lang = $request->header('accept-language');
        if($lang && in_array($lang , ['ar' , 'en'])){
            app()->setLocale($lang);
        }
        return $next($request);
    }
}
