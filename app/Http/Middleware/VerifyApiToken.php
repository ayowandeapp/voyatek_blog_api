<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header('Authorization') !== 'vg@123') {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        // Fetch the user with the token
        $user = User::where('api_token', 'vg@123')->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Attach the user as the authenticated user
        auth()->login($user);

        return $next($request);
    }
}
