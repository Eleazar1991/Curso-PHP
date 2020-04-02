<?php

namespace App\Http\Middleware;

use Closure;

class testyear
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
        $year=$request->route('year');
        //Si no me llega año o no es el año 2019 redirijo
        if(is_null($year) || $year != 2019){
            var_dump($year);
            return redirect('/peliculas');
        }
        return $next($request);
    }
}
