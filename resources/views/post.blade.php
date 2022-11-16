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
        <div class="pageContent__main">
            <main class="content">
                <div class="content__holder">
                    <div class="section">
                        <div class="post">
                            <div class="post__holder">
                                <div class="post__image">
                                    <img src="https://images.unsplash.com/photo-1659535964542-63e75ddb28ef?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                                        style="width: 100%; height: 100%; border-radius: var(--rounded--extralarge)">
                                    <div class="post__image--overlay">
                                        <div class="post__image--controls">
                                            <div class="control control__actionable">
                                                <img src="https://kierannoble.dev/assets/me.webp">
                                            </div>
                                            <div class="control control__actionable control__actionable--active">
                                                <i class="icon fa fa-thumbs-up"></i>
                                            </div>
                                            <div class="control control__actionable">
                                                <i class="icon fa fa-thumbs-down"></i>
                                            </div>
                                            <div class="control control__actionable">
                                                <i class="icon fa fa-magnifying-glass-arrow-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="post__info" style="display: flex; flex-direction: column">
                                    <div class="section">
                                        <span class="section__title">Here is a long post title that will span across
                                            multiple lines</span>
                                        <span class="section__subtitle">Here is some more text that further goes to
                                            explain what the post is about, again being able to span multiple lines, so
                                            much so that it might actually be so long that I want to put a limit on it
                                            to stop it overflowing too much and causing the layout to shift vertically.
                                            More text here...</span>
                                    </div>
                                    <hr class="seperator" />
                                    <div class="">tags</div>
                                    <div class="">tags</div>
                                    <hr class="seperator" />
                                    <div class="">comments</div>
                                    <div class="">comments</div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="" style="position: absolute; top:0; left: 0; padding: var(--spacing6);">
                            <div class="control control__actionable">
                                <i class="icon fa fa-arrow-left"></i>
                            </div>
                        </div> --}}
                    </div>
                    <div class="section">
                        posts
                    </div>
                </div>
            </main>
        </div>
    </section>
</body>
