@extends('layouts.master')

@section('title')
    <title>404 | TyleNinja</title>
@stop

@section('content')
        <section class="hero no-pad-bot" id="main-splash">
            <div class="row hero center">
                <div class="col s12 center-align">
                    <h4 class="red-text text-lighten-2 uppercase">404: Not found</h4>
                    <h2 class="white-text thin plug">A ninja stole this page.</h2>
                    <a href="{{{ action('HomeController@showHome') }}}" id="play-button" class="btn waves-effect waves-light go-home">Go home</a>
                </div>
            </div>
        </section>
@stop
