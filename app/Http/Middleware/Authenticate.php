<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }

    protected function unauthenticated($request, array $guards)
    {
        throw new AuthenticationException(
            'Anuathorized client.',
            $guards,
            $this->redirectTo($request)
        );
    }

    public function handle($request, Closure $next, ...$guards)
    {
        $request->headers->set('X-Requested-With', 'XMLHttpRequest');

        if ($jwt = $request->cookie('jwt')) {
            $request->headers->set('authorization', 'Bearer' . $jwt);
        }

        $this->authenticate($request, $guards);

        return $next($request);
    }
}
