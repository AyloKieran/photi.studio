<?php

namespace App\Http\Middleware;

use Closure;

class RequireOnboarded
{
    public function handle($request, Closure $next, ...$guards)
    {
        $user = $request->user();

        if (!isset($user)) {
            return $next($request);
        }

        if (is_numeric($user->onboarding_step)) {
            switch ($user->onboarding_step) {
                case 0:
                    return redirect()->route('onboarding.profile');
                case 1:
                    return redirect()->route('onboarding.preferences');
                case 2:
                    return redirect()->route('onboarding.friends');
            }
        }

        return $next($request);
    }
}
