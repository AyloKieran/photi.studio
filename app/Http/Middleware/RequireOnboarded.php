<?php

namespace App\Http\Middleware;

use Closure;

class RequireOnboarded
{
    public function handle($request, Closure $next, ...$guards)
    {
        $user = auth()->user();

        if (!isset($user)) {
            return $next($request);
        }

        // TO DO: Cache user's onboarding status

        // if (is_numeric($user->onboarding)) {
        //     switch ($user->onboarding) {
        //         case 0:
        //             return redirect()->route('onboarding.profile');
        //         case 1:
        //             return redirect()->route('onboarding.preferences');
        //         case 2:
        //             return redirect()->route('onboarding.friends');
        //     }
        // }

        return $next($request);
    }
}
