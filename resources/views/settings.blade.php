<x-preferences-layout title="{{ __('Profile Information') }}">
    <section class="header">
        <h1 class="header__title">Profile Information</h1>
        <h2 class="header__subtitle">How do you want to be seen on Photi.Studio?</h2>
        <hr class="seperator" />
    </section>
    <main class="content">
        <div class="content__holder">
            <div class="section">
                <span class="section__title">Input</span>
                <span class="section__subtitle">This control allows for users to use form inputs</span>
                <div class="section__content">
                    <div class="control control__input">
                        <textarea placeholder="tester"></textarea>
                    </div>
                </div>
            </div>
            <div class="section">
                <span class="section__title">Input</span>
                <span class="section__subtitle">This control allows for users to use form inputs</span>
                <div class="section__content">
                    <div class="control control__input">
                        <input type="text" class="" placeholder="placeholder">
                    </div>
                </div>
            </div>
            <div class="section">
                <span class="section__title">Input</span>
                <span class="section__subtitle">This control allows for users to use form inputs</span>
                <div class="section__content">
                    <div class="control control__input">
                        <input type="datetime-local" class="" placeholder="placeholder">
                    </div>
                </div>
            </div>
            <div class="section">
                <span class="section__title">Dropdown - Checkbox</span>
                <span class="section__subtitle">This control allows for multiple items to be
                    selected</span>
                <div class="section__content">
                    <div class="control control__dropdown">
                        <div class="control__button">
                            <span class="control__button-text">Select...</span>
                            <i class="control__button-icon icon fa-solid fa-angles-down"></i>
                        </div>
                        <div class="control__dropdown-content">
                            <label class="control__dropdown-item">
                                <input type="checkbox" name="testControl" checked>
                                <div class="control__dropdown-item-text">
                                    <span>Item One</span>
                                    <i class="control__dropdown-item-checked icon fa-solid fa-check"></i>
                                </div>
                            </label>
                            <label class="control__dropdown-item">
                                <input type="checkbox" name="testControl">
                                <div class="control__dropdown-item-text">
                                    <span>Item Two</span>
                                    <i class="control__dropdown-item-checked icon fa-solid fa-check"></i>
                                </div>
                            </label>
                            <label class="control__dropdown-item">
                                <input type="checkbox" name="testControl" checked>
                                <div class="control__dropdown-item-text">
                                    <span>Item Three</span>
                                    <i class="control__dropdown-item-checked icon fa-solid fa-check"></i>
                                </div>
                            </label>
                            <label class="control__dropdown-item">
                                <input type="checkbox" name="testControl">
                                <div class="control__dropdown-item-text">
                                    <span>Item Four</span>
                                    <i class="control__dropdown-item-checked icon fa-solid fa-check"></i>
                                </div>
                            </label>
                            <label class="control__dropdown-item">
                                <input type="checkbox" name="testControl">
                                <div class="control__dropdown-item-text">
                                    <span>Item Five</span>
                                    <i class="control__dropdown-item-checked icon fa-solid fa-check"></i>
                                </div>
                            </label>
                            <label class="control__dropdown-item">
                                <input type="checkbox" name="testControl">
                                <div class="control__dropdown-item-text">
                                    <span>Item Six</span>
                                    <i class="control__dropdown-item-checked icon fa-solid fa-check"></i>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <span class="section__title">Dropdown - Radio</span>
                <span class="section__subtitle">This control allows for only a single item to be
                    selected</span>
                <div class="section__content">
                    <div class="control control__dropdown">
                        <div class="control__button">
                            <span class="control__button-text">Select...</span>
                            <i class="control__button-icon icon fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="control__dropdown-content">
                            <label class="control__dropdown-item">
                                <input type="radio" name="testControl" checked>
                                <div class="control__dropdown-item-text">
                                    <span>Item One</span>
                                    <i class="control__dropdown-item-checked icon fa-solid fa-check"></i>
                                </div>
                            </label>
                            <label class="control__dropdown-item">
                                <input type="radio" name="testControl">
                                <div class="control__dropdown-item-text">
                                    <span>Item Two</span>
                                    <i class="control__dropdown-item-checked icon fa-solid fa-check"></i>
                                </div>
                            </label>
                            <label class="control__dropdown-item">
                                <input type="radio" name="testControl">
                                <div class="control__dropdown-item-text">
                                    <span>Item Three</span>
                                    <i class="control__dropdown-item-checked icon fa-solid fa-check"></i>
                                </div>
                            </label>
                            <label class="control__dropdown-item">
                                <input type="radio" name="testControl">
                                <div class="control__dropdown-item-text">
                                    <span>Item Four</span>
                                    <i class="control__dropdown-item-checked icon fa-solid fa-check"></i>
                                </div>
                            </label>
                            <label class="control__dropdown-item">
                                <input type="radio" name="testControl">
                                <div class="control__dropdown-item-text">
                                    <span>Item Five</span>
                                    <i class="control__dropdown-item-checked icon fa-solid fa-check"></i>
                                </div>
                            </label>
                            <label class="control__dropdown-item">
                                <input type="radio" name="testControl">
                                <div class="control__dropdown-item-text">
                                    <span>Item Six</span>
                                    <i class="control__dropdown-item-checked icon fa-solid fa-check"></i>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <span class="section__title">Toggle</span>
                <span class="section__subtitle">This control allows for only a boolean selection</span>
                <div class="section__content">
                    <div class="control control__toggle">
                        <div class="control__button">
                            <label class="">
                                <input type="checkbox" name="testControl" checked>
                                <span class="control__button-slider"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <span class="section__title">Table</span>
                <span class="section__subtitle">Shows tabular data with actionables</span>
                <div class="section__content">
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
                </div>
            </div>
        </div>
    </main>
</x-preferences-layout>
