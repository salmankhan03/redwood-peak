<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            return response()->json(['error' => 'Token not valid'], 401);
        }

        if (!$user || !$user->isAdmin()) {
            return response()->json(['status_code' => 403, 'message' => 'Forbidden'], 403);
        }

        return $next($request);
    }
}
