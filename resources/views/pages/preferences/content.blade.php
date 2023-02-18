<x-preferences-layout title="{{ __('Content') }}">
    <x-header title="{{ __('Content') }}" subtitle="{{ __('How do you want Photi.Studio to behave?') }}" />
    <main class="content">
        <form method="POST" action="{{ route('preferences.content.update') }}">
            @csrf
            <div class="content__holder">
                <x-section title="{{ __('Page Size') }}"
                    subtitle="{{ __('How many posts should be displayed on each page?') }}">
                    <x-input :name="$pageSizeKey" type="number" :value="$pageSize" required />
                </x-section>
                <x-section title="{{ __('Minimum Matching Tags') }}"
                    subtitle="{{ __('How many matching tags should related posts have?') }}">
                    <x-input :name="$minimumMatchingTagsKey" type="number" :value="$minimumMatchingTags" required />
                </x-section>
                <x-section title="{{ __('Include Interacted Posts In Feeds') }}"
                    subtitle="{{ __('Should feeds show posts that you have liked or disliked?') }}">
                    {{-- <x-input :name="$maximumRelatedPostsKey" type="number" :value="$maximumRelatedPosts" required /> --}}
                    <x-toggle :name="$showInteractedKey" :value="$showInteracted" required />
                </x-section>
                <div class="content__footer">
                    <x-button secondary href="{{ route('preferences.content') }}">{{ __('Cancel') }}</x-button>
                    <x-button primary type="submit">{{ __('Save') }}</x-button>
                </div>
            </div>
        </form>
    </main>
</x-preferences-layout>
