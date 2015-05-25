<!doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    @yield('meta-token')
    @yield('title')
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="/css/main.css">

    <!-- Windows mobile viewport patch -->
    <script src="/js/windows-viewport.js"></script>
</head>
<body>
    <div id="wrap">
        @include('partials.nav')

        @yield('content')

        @include('partials.footer')
    </div>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery-2.1.1.min.js"><\/script>')</script>
    <script src="/js/materialize.min.js"></script>
    <script src="/js/init.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js"></script>

    @yield('game-script')

    @if (Session::has('successMessage'))
        <script>
            Materialize.toast("{{{ Session::get('successMessage') }}}", 2500, 'teal darken-1');
        </script>
    @endif

    @if (Session::has('errorMessage'))
        <script>
            Materialize.toast("{{{ Session::get('errorMessage') }}}", 2500, 'red darken-1');
        </script>
    @endif
</body>
</html>
