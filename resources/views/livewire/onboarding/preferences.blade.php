<form>
    <x-section>
        <x-input type="text" name="unused" placeholder="{{ __('Search for a tag') }}" wire="search" />
    </x-section>
    <x-section>
        <div class="control control__table">
            <table>
                <thead>
                    <tr>
                        <th>Tag</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tags as $tag)
                        <tr>
                            <td>{{ $tag->name }}</td>
                            @if (in_array($tag->id, $selectedTags))
                                <td style="width: 1%;" wire:click="removeTag('{{ $tag->id }}')">
                                    <i class="icon fa-solid fa-minus" wire:loading.remove></i>
                                    <i class="icon fa-solid fa-spinner fa-spin" wire:loading></i>
                                </td>
                            @else
                                <td style="width: 1%;" wire:click="addTag('{{ $tag->id }}')">
                                    <i class="icon fa-solid fa-plus" wire:loading.remove></i>
                                    <i class="icon fa-solid fa-spinner fa-spin" wire:loading></i>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">
                                No tags found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-section>
    <x-footer>
        @if ($canSubmit)
            <x-button primary onClick="window.livewire.emit('save')">
                {{ __('Next') }}
            </x-button>
        @else
            <x-button disabled primary>
                {{ __('Next') }}
            </x-button>
        @endif
    </x-footer>
</form>
