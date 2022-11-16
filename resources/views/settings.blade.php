<!DOCTYPE html>
<html lang="en" class="theme--liht">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/UI/main.scss'])
</head>

<body class="wrapper">
    <nav class="navigation">
        <input id="navigation__shown" type="checkbox">
        <div class="navigation__header">
            <div>logo</div>
            <label class="navigation__toggle" for="navigation__shown">
                <i class="fa fa-bars"></i>
            </label>
        </div>
        <aside class="navigation__bar">
            <div class="nav">
                <div class="nav__section">
                    <div class="nav__link nav__link--actionable">
                        <div class="nav__link-title">Upload Photo</div>
                    </div>
                </div>
                <div class="nav__section">
                    <span class="nav__section-title">Posts</span>
                    <div class="nav__link nav__link--active">
                        <i class="nav__link-icon icon fa-solid fa-home"></i>
                        <div class="nav__link-title">My Feed</div>
                    </div>
                    <div class="nav__link">
                        <i class="nav__link-icon icon fa-solid fa-search"></i>
                        <div class="nav__link-title">Search</div>
                    </div>
                    <div class="nav__link">
                        <i class="nav__link-icon icon fa-solid fa-arrow-trend-up"></i>
                        <div class="nav__link-title">Trending</div>
                    </div>
                    <div class="nav__link">
                        <i class="nav__link-icon icon fa-solid fa-users"></i>
                        <div class="nav__link-title">Friends</div>
                    </div>
                </div>
                <div class="nav__section">
                    <span class="nav__section-title">Social</span>
                    <div class="nav__link">
                        <i class="nav__link-icon icon fa-solid fa-bell"></i>
                        <div class="nav__link-title">Notifications</div>
                    </div>
                    <div class="nav__link">
                        <i class="nav__link-icon icon fa-solid fa-envelope"></i>
                        <div class="nav__link-title">Messages</div>
                    </div>
                </div>
                <div class="nav__section">
                    <span class="nav__section-title">Prototype</span>
                    <div class="nav__link">
                        <i class="nav__link-icon icon fa-solid fa-comments"></i>
                        <div class="nav__link-title">Prototype Feedback</div>
                    </div>
                </div>
            </div>
            <div class="navigation__auth">
                <a href="#" class="navigation__user">
                    <img src="https://kierannoble.dev/assets/me.webp">
                    <span>@AyloKieran</span>
                </a>
                <div class="navigation__actions">
                    <i class="icon fa-solid fa-cog"></i>
                    <i class="icon fa-solid fa-arrow-right-from-bracket"></i>
                </div>
            </div>

        </aside>
        <label class="navigation__shade" for="navigation__shown"></label>
    </nav>
    <section class="pageContent">
        <input id="pageContent__aside--open" type="checkbox">
        <aside class="pageContent__aside">
            <label for="pageContent__aside--open">
                <i class="icon fa-solid fa-chevron-right"></i>
            </label>
            <div class="nav">
                <div class="nav__section">
                    <span class="nav__section-title">Account</span>
                    <div class="nav__link nav__link--active">
                        <i class="nav__link-icon icon fa-solid fa-user"></i>
                        <div class="nav__link-title">Profile Information</div>
                    </div>
                    <div class="nav__link">
                        <i class="nav__link-icon icon fa-solid fa-brush"></i>
                        <div class="nav__link-title">Theme</div>
                    </div>
                    <div class="nav__link">
                        <i class="nav__link-icon icon fa-solid fa-key"></i>
                        <div class="nav__link-title">Change Password</div>
                    </div>
                    <div class="nav__link">
                        <i class="nav__link-icon icon fa-solid fa-trash"></i>
                        <div class="nav__link-title">Deactivate Profile</div>
                    </div>
                </div>
                <div class="nav__section">
                    <span class="nav__section-title">My Data</span>
                    <div class="nav__link">
                        <i class="nav__link-icon icon fa-solid fa-camera"></i>
                        <div class="nav__link-title">Photos</div>
                    </div>
                    <div class="nav__link">
                        <i class="nav__link-icon icon fa-solid fa-book"></i>
                        <div class="nav__link-title">Comments</div>
                    </div>
                    <div class="nav__link">
                        <i class="nav__link-icon icon fa-solid fa-thumbs-up"></i>
                        <div class="nav__link-title">Likes</div>
                    </div>
                </div>
                <div class="nav__section">
                    <span class="nav__section-title">Social</span>
                    <div class="nav__link">
                        <i class="nav__link-icon icon fa-solid fa-bolt"></i>
                        <div class="nav__link-title">Connected Accounts</div>
                    </div>
                </div>
            </div>
        </aside>
        <div class="pageContent__main">
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
                        <span class="section__subtitle">This control allows for multiple items to be selected</span>
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
                                                <td>1 with some really long text here to make it longer than the screen
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
                <!-- <footer class="footer">
                    footer
                </footer> -->
            </main>
        </div>
    </section>
</body>
