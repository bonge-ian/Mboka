<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class VerifyRedirectUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$redirect = $request->get('redirect')) {
            return $next($request);
        }

        $url = parse_url($redirect);

        if (
            isset($url['host']) &&
            $url['host'] !== $request->getHost()
        ) {
            throw new AccessDeniedHttpException("Redirect host mismatch");
        }


        return $next($request);
    }
}
