<?php

namespace App\Http\Middleware;

use App\Enums\OnboardingStepEnum;
use Closure;

class RequireOnboarded
{
    public function handle($request, Closure $next, ...$guards)
    {
        $user = $request->user();

        if (!isset($user)) {
            return $next($request);
        }

        if ($user->onboarding_step != OnboardingStepEnum::FINISHED) {
            switch ($user->onboarding_step) {
                case OnboardingStepEnum::PROFILE->value:
                    return redirect()->route('onboarding.profile');
                case OnboardingStepEnum::PREFERENCES->value:
                    return redirect()->route('onboarding.preferences');
                case OnboardingStepEnum::FREINDS->value:
                    return redirect()->route('onboarding.friends');
            }
        }

        return $next($request);
    }
}
