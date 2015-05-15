@extends('layouts.master')

@section('title')
    <title>Profile | TyleNinja</title>
@stop

@section('content')
    {{-- <section id="profile"> --}}
        <div class="pad-bot">
            <div class="row">
                <div class="col s12 m8 offset-m2 l6 offset-l3">
                    <ul class="collection">
                        <li class="collection-item"><h5 class="blue-grey-text text-darken-2">User Profile</h5></li>
                        <li class="collection-item avatar">
                            <img src="/img/justin.jpg" alt="" class="circle">
                            <span class="title">{{{ Auth::user()->username }}}</span>
                            <p>Joined {{{ Auth::user()->created_at }}}</p>
                            <p>Second Line</p>
                            <a href="#" class="secondary-content"><i class="mdi-editor-mode-edit"></i> Edit</a>
                        </li>
                        <li class="collection-item">Alvin</li>
                        <li class="collection-item">Alvin</li>
                        <li class="collection-item">Alvin</li>
                    </ul>
                </div>
            </div>
        </div>
    {{-- </section> --}}
@stop
