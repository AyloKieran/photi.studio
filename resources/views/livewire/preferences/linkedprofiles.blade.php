<div class="content">
    <div class="content__holder">
        <x-section title="{{ __('Platform') }}">
            <x-radio name="unused" :values=$platforms wire="platform" />
        </x-section>
        @if ($showURL)
            <x-section title="{{ __(':platform URL', ['platform' => ucfirst($platform)]) }}">
                <x-input type="text" name="username" value="" required wire="url" />
            </x-section>
        @endif
        <div class="content__footer">
            <x-button secondary href="{{ route('preferences.linked-profiles') }}">{{ __('Cancel') }}</x-button>
            @if ($canSubmit)
                <x-button primary onClick="window.livewire.emit('save')">{{ __('Save') }}</x-button>
            @else
                <x-button primary disabled>{{ __('Save') }}</x-button>
            @endif
        </div>
    </div>
</div>
