        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
            @if(Auth::check())
                <li><a href="#">Profile</a></li>
            @endif
            <li><a href="{{{ action('GameController@index') }}}">Play</a></li>
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
                        <li class="blue-grey-text text-lighten-2 user-welcome">Welcome, {{{ Auth::user()->username }}}!</li>
                    @endif
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-button nav-link" href="#!" data-activates="dropdown1">Menu<i class="mdi-navigation-expand-more right"></i></a></li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#">Profile</a></li>
                    <li><a href="{{{ action('GameController@index') }}}">Play</a></li>
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
