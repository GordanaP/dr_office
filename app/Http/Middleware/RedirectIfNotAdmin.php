<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class RedirectIfNotAdmin
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
        if( Auth::check() && ! Auth::user()->hasRole('admin'))
        {
            return $this->failedResponse();
        }

        return $next($request);
    }

    /**
     * The response has failed.
     *
     * @return mixed
     */
    protected function failedResponse()
    {
        $response = message('The action is unauthorized.', 'error');

        return back()->with($response);
    }
}
