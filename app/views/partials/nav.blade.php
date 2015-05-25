        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
            @if(Auth::check())
                <li class="user"><a class="blue-grey-text text-darken-2" href="{{{ action('UsersController@getShow', Auth::user()->username) }}}">{{{ Auth::user()->username }}}</a></li>
                <li class="divider"></li>
                <li><a href="/about">About</a></li>
                <li><a href="{{{ action('UsersController@getShow', Auth::user()->username) }}}">Profile</a></li>
                <li><a href="{{{ action('GameController@getIndex') }}}">Play</a></li>
            @else
                <li><a href="#about" class="scroll-to-about">About</a></li>
                <li class="divider"></li>
                <li><a href="{{{ action('UsersController@getCreate') }}}">Create account</a></li>
            @endif

            <li class="divider"></li>

            @if(Auth::check())
                <li><a href="{{{ action('HomeController@logout') }}}">Log out</a></li>
            @else
                <li><a href="{{{ action('HomeController@login') }}}">Log in</a></li>
            @endif
        </ul>
        <nav class="transparent" role="navigation">
            <div class="nav-wrapper">
                <a id="logo-container" href="{{{ action('HomeController@showHome') }}}" class="brand-logo teal-text text-lighten-2">TyleNinja</a>
                <ul class="right hide-on-med-and-down">
                    @if(Auth::check())
                        <li><a class="blue-grey-text text-lighten-2 user-welcome" href="{{{ action('UsersController@getShow', Auth::user()->username) }}}">Welcome, {{{ Auth::user()->username }}}!</a></li>
                    @endif
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-button nav-link" href="#" data-constrainwidth="false" data-activates="dropdown1">Menu<i class="mdi-navigation-expand-more right"></i></a></li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    @if(Auth::check())
                        <li class="user"><a class="blue-grey-text text-darken-2" href="{{{ action('UsersController@getShow', Auth::user()->username) }}}">{{{ Auth::user()->username }}}</a></li>
                        <li class="divider"></li>
                        <li id="about-side-nav"><a href="/about">About</a></li>
                        <li><a href="{{{ action('UsersController@getShow', Auth::user()->username) }}}">Profile</a></li>
                        <li><a href="{{{ action('GameController@getIndex') }}}">Play</a></li>
                    @else
                        <li><a href="#about" class="scroll-to-about">About</a></li>
                        <li class="divider"></li>
                        <li><a href="{{{ action('UsersController@getCreate') }}}">Create account</a></li>
                    @endif

                    <li class="divider"></li>

                    @if(Auth::check())
                        <li><a href="{{{ action('HomeController@logout') }}}">Log out</a></li>
                    @else
                        <li><a href="{{{ action('HomeController@login') }}}">Log in</a></li>
                    @endif
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse right blue-grey-text text-lighten-2"><i class="mdi-navigation-menu"></i></a>
            </div>
        </nav>
