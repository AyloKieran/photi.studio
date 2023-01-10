<?php

namespace App\Http\Middleware;

use Closure;

class RequireVerifiedEmail
{
    public function handle($request, Closure $next, ...$guards)
    {
        $user = auth()->user();

        if (!isset($user)) {
            return $next($request);
        }

        if ($user->email_verified_at == null) {
            return redirect()->route('verification.notice');
        }

        return $next($request);
    }
}
