<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckHeaderForEmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $headerValueWithKey = $request->hasHeader('x-api-key') && $request->header('x-api-key') == 'employee';

        if ($headerValueWithKey) {
            return $next($request);

        }
        return new Response(null, 403);
    }
}
