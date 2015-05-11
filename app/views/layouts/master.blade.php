<!doctype html>
<html lang="en-US" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>TyleNinja</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="/css/main.css">

    <!-- If JavaScript disabled, .no-js classes will take effect -->
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <!-- Windows mobile viewport patch -->
    <script src="/js/windows-viewport.js"></script>
</head>
<body>

    <!-- <div class="navbar-fixed"> -->
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="#!">Profile</a></li>
            <li><a href="#!">Play</a></li>
            <li class="divider"></li>
            <li><a href="#!">Log out</a></li>
        </ul>
        <nav class="transparent" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo teal-text text-lighten-2">TyleNinja</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#" class="blue-grey-text text-lighten-2">Welcome, guest!</a></li>
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-button nav-link blue-grey-text text-lighten-2" href="#!" data-activates="dropdown1">Account<i class="mdi-navigation-expand-more right small"></i></a></li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#">Welcome, guest!</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#!">Play</a></li>
                    <li><a href="#!">Log out</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse right blue-grey-text text-lighten-2"><i class="mdi-navigation-menu"></i></a>
            </div>
        </nav>
    <!-- </div> -->
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <div class="row center">
                <a href="#" id="download-button" class="btn-large waves-effect waves-teal blue-grey lighten-5 play">Start Playing!</a>
            </div>
            <br><br>
        </div>
    </div>


    <div class="container">
        <div class="section">


        </div>
    </div>

    <footer class="page-footer blue-grey darken-4">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="blue-grey-text text-darken-1">Company Bio</h5>
                    <p class="blue-grey-text text-darken-1">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
                </div>
                <div class="col l3 s12">
                    <h5 class="blue-grey-text text-darken-1">Settings</h5>
                    <ul>
                        <li><a class="blue-grey-text text-darken-1" href="#!">Link 1</a></li>
                        <li><a class="blue-grey-text text-darken-1" href="#!">Link 2</a></li>
                        <li><a class="blue-grey-text text-darken-1" href="#!">Link 3</a></li>
                        <li><a class="blue-grey-text text-darken-1" href="#!">Link 4</a></li>
                    </ul>
                </div>
                <div class="col l3 s12">
                    <h5 class="blue-grey-text text-darken-1">Connect</h5>
                    <ul>
                        <li><a class="blue-grey-text text-darken-1" href="#!">Link 1</a></li>
                        <li><a class="blue-grey-text text-darken-1" href="#!">Link 2</a></li>
                        <li><a class="blue-grey-text text-darken-1" href="#!">Link 3</a></li>
                        <li><a class="blue-grey-text text-darken-1" href="#!">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Copyright &copy; {{ date('Y') }} J-squared.
            </div>
        </div>
    </footer>



    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery-2.1.1.min.js"><\/script>')</script>
    <script src="/js/materialize.min.js"></script>
    <script src="/js/init.js"></script>
</body>
</html>
