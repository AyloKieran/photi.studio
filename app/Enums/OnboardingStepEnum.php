<?php

namespace App\Enums;

enum OnboardingStepEnum: int
{
    case FINISHED = 0;
    case PROFILE = 1;
    case PREFERENCES = 2;
    case FREINDS = 3;
}
