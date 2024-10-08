<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceHttpsForDocs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the docs should be served over HTTPS
        $appUrlIsHttps = config('scramble.https') === true;

        // Check if the request path is one of the docs paths
        $shouldForceHttps = in_array($request->path(), ['docs/api', 'docs/api.json']);

        // Force HTTPS
        if ($appUrlIsHttps && $shouldForceHttps && !$request->secure()) {
            $request->server->set('HTTPS', 'on');
        }

        return $next($request);
    }
}
