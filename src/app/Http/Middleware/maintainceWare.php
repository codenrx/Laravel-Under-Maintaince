<?php

namespace codenrx\maintaince\App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class maintainceWare
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
        $status = env('MAINTAINCE_STATUS');
        $type = env('MAINTAINCE_TYPE');
        if ($status == 'on') {
            if ($type == 'maintaince') {
                return new Response(view('maintaince::maintaince'));
            } else if ($type == 'underconstruction') {
                return new Response(view('maintaince::underconstruction'));
            }
        } else {
            return $next($request);
        }
    }
}
