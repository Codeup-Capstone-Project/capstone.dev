        <footer class="page-footer blue-grey darken-4">
            <div class="container">
                <div class="row">
                    <div class="col l5 s12">
                        <h5 class="blue-grey-text text-darken-1">TyleNinja</h5>
                        <p class="blue-grey-text text-darken-1">We are a team of Codeup students working on this project like it's our full time job. If you would like to donate any amount so we may continue development, please contact us.</p>
                    </div>
                    <div class="col l3 offset-l1 s12">
                        <h5 class="blue-grey-text text-darken-1">About</h5>
                        <ul>
                            <li><a class="blue-grey-text text-darken-1" href="{{{ action('HomeController@showHome') }}}#about">About the Game</a></li>
                            <li><a class="blue-grey-text text-darken-1" href="{{{ action('HomeController@showHome') }}}#creators">The Creators</a></li>
                        </ul>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="blue-grey-text text-darken-1">Connect</h5>
                        <ul>
                            <li><a class="blue-grey-text text-darken-1" href="https://github.com/Codeup-Capstone-Project">GitHub</a></li>
                            <li><a class="blue-grey-text text-darken-1" href="#">Email us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Copyright &copy; {{ date('Y') }} TyleNinja.
                </div>
            </div>
        </footer>
