<x-preferences-layout title="{{ __('Profile Information') }}">
    <section class="header">
        <h1 class="header__title">Profile Information</h1>
        <h2 class="header__subtitle">How do you want to be seen on Photi.Studio?</h2>
        <hr class="seperator" />
    </section>
    <main class="content">
        <div class="content__holder">
            <x-section title="{{ _('Text Area Control') }}"
                subtitle="{{ _('This control allows for longer text inputs, such as bios') }}">
                <x-textarea name="unused" placeholder="placeholder" />
            </x-section>
            <x-section title="{{ _('Generic Input Control') }}"
                subtitle="{{ _('This control allows for users to use form inputs') }}">
                <x-input type="datetime-local" name="unused" />
            </x-section>
            <x-section title="{{ _('Toggle Control') }}"
                subtitle="{{ _('This control allows for users to provide Boolean inputs') }}">
                <x-toggle name="unused" checked="" />
            </x-section>

            @php
                $values = [
                    (object) [
                        'key' => 'Item One',
                        'value' => 'item-one',
                        'checked' => true,
                    ],
                    (object) [
                        'key' => 'Item Two',
                        'value' => 'item-two',
                        'checked' => false,
                    ],
                    (object) [
                        'key' => 'Item Three',
                        'value' => 'item-three',
                        'checked' => false,
                    ],
                ];
            @endphp

            <x-section title="{{ _('Checkbox Control (Dropdown)') }}"
                subtitle="{{ _('This control allows for users to use checkbox form inputs') }}">
                <x-checkbox name="unused" :values="$values" />
            </x-section>
            <x-section title="{{ _('Radio Control (Dropdown)') }}"
                subtitle="{{ _('This control allows for users to use radio form inputs') }}">
                <x-radio name="radio" :values="$values" />
            </x-section>
            <x-section title="{{ _('Table Control') }}"
                subtitle="{{ _('This control allows for users to use form inputs') }}">
                <div class="control control__table control__table--sortable control__table--navigatable">
                    <div class="control__table--holder">
                        <table>
                            <thead>
                                <tr>
                                    <th>Column 1</th>
                                    <th>Column 2</th>
                                    <th>Column 3</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>1 with some really long text here to make it longer than the
                                        screen
                                    </td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>f1</td>
                                    <td>f2</td>
                                    <td>f3</td>
                                    <td>f4</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </x-section>

        </div>
    </main>
</x-preferences-layout>
