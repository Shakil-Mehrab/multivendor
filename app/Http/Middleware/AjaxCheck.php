<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AjaxCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->ajax()){
            return  response()->view('layout.errors.404');
          }
          return $next($request);
    }
}
