<form>
    <x-section>
        <x-input type="text" name="unused" placeholder="{{ __('Search for a profile') }}" wire="search" />
    </x-section>
    <x-section>
        <div class="control control__table">
            <table>
                <thead>
                    <tr>
                        <th>Profile</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>
                                <span style="font-weight: var(--font--bold);">{{ $user->name }}</span>
                                <span>({{ $user->username }})</span>
                            </td>
                            @if (in_array($user->id, $selectedUsers))
                                <td wire:click="removeUser('{{ $user->id }}')">
                                    <i class="icon fa-solid fa-minus"></i>
                                </td>
                            @else
                                <td wire:click="addUser('{{ $user->id }}')">
                                    <i class="icon fa-solid fa-plus"></i>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">
                                No profiles found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-section>
    <x-footer>
        <x-button secondary onClick="window.livewire.emit('save')">
            {{ __('Skip') }}
        </x-button>
        <x-button primary onClick="window.livewire.emit('save')">
            {{ __('Finish') }}
        </x-button>
    </x-footer>
</form>
