<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = config('api.key');
        $headerApiKey = $request->header('X-API-KEY');

        if ($apiKey !== $headerApiKey) return response()->json(['message' => 'Unauthorized'], 401);

        return $next($request);
    }
}
