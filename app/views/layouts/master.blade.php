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
    <div id="wrap">
        @include('partials.nav')

        @if (Session::has('successMessage'))
            <div class="flash" id="success"><p>&plus; {{{ Session::get('successMessage') }}}</p></div>
        @endif
        @if (Session::has('errorMessage'))
            <div class="flash" id="failure"><p>&osol; {{{ Session::get('errorMessage') }}}</p></div>
        @endif

        @yield('content')

        @include('partials.footer')
    </div>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery-2.1.1.min.js"><\/script>')</script>
    <script src="/js/materialize.min.js"></script>
    <script src="/js/init.js"></script>
</body>
</html>
