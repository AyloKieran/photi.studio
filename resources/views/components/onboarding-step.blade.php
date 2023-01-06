@props(['label', 'step', 'currentStep', 'last' => false])

@php
    $complete = $step < $currentStep;
    $active = !$complete && $step == $currentStep;
@endphp

<div
    class="onboarding__step @if ($active) onboarding__step--active @endif @if ($complete) onboarding__step--complete @endif">
    {{ $label }}
</div>
@if (!$last)
    <div class="onboarding__step--connector"></div>
@endif
