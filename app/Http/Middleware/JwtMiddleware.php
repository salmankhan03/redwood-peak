<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class JwtMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            return response()->json(['error' => 'Token not valid'], 401);
        }

        // authenticate() returns false when the user no longer exists (deleted after the token was issued)
        if (!$user || $user->isBlocked()) {
            return response()->json(['error' => 'Token not valid'], 401);
        }

        return $next($request);
    }
}