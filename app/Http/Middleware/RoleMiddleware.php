<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        // Map roles to role IDs in the database
        $roles = [
            'admin' => 1,
            'teacher' => 2,
            'student' => 3,
        ];

        // Check if user role matches required role
        if (!$user || $user->role_id != $roles[$role]) {
            return redirect()->back()->with('error', 'Unauthorize access');
        }

        return $next($request);
    }
}
