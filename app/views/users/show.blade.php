@extends('layouts.master')

@section('title')
    <title>Profile | TyleNinja</title>
@stop

@section('content')
        <div class="pad-bot">
            <div class="row">
                <div class="col s12 m8 offset-m2 l6 offset-l3">
                    <ul class="collection z-depth-3">
                        <li class="collection-item"><h4 class="blue-grey-text text-darken-2">User Profile</h4></li>
                        <li class="collection-item avatar">
                            <img src="/img/justin.jpg" alt="" class="circle">
                            <span class="title">{{{ Auth::user()->username }}}</span>
                            <p>{{{ Auth::user()->email }}}</p>
                            <p>Joined {{{ Auth::user()->created_at }}}</p>
                            <a href="#" class="secondary-content"><i class="mdi-editor-mode-edit"></i> Edit</a>
                        </li>
                        <li class="collection-item"><h5 class="blue-grey-text text-darken-2">Game Stats</h5></li>
                        <li class="collection-item">Alvin</li>
                        <li class="collection-item">Alvin</li>
                        <li class="collection-item">Alvin</li>
                    </ul>
                </div>
            </div>
        </div>
@stop
