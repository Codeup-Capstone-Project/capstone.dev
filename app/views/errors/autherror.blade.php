@extends('layouts.master')

@section('title')
    <title>Auth Error | TyleNinja</title>
@stop

@section('content')
        <section class="hero no-pad-bot" id="main-splash">
            <div class="row hero center">
                <div class="col s12 center-align">
                    <h4 class="red-text text-lighten-2 uppercase">500: Log in error.</h4>
                    <h2 class="white-text thin plug">Please try a different log in method.</h2>
                    <a href="{{{ action('HomeController@login') }}}" id="play-button" class="btn waves-effect waves-light go-home">Go to log in</a>
                </div>
            </div>
        </section>
@stop
