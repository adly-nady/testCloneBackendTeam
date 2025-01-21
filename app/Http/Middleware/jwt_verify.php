<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class jwt_verify
{
    public function handle(Request $request, Closure $next)
    {
        try {
          $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            return response()->json(['message' => 'انت لست مسجل', 'errCode' => 304]);
        }
        return $next($request);
    }
}
