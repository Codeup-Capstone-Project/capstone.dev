@extends('layouts.master')

@section('title')
    <title>Profile | TyleNinja</title>
@stop

@section('content')
        <div class="pad-bot">
            <div class="row">
                <div class="col s12 m8 offset-m2 l6 offset-l3">
                    <ul class="collection z-depth-2">
                        <li class="collection-item"><h5 class="blue-grey-text text-darken-2">User Profile</h5></li>
                        <li class="collection-item avatar">
                            <img src="/img/justin.jpg" alt="" class="circle">
                            <span class="title">{{{ Auth::user()->username }}}</span>
                            <p>{{{ Auth::user()->email }}}</p>
                            <p>Joined {{{ Auth::user()->created_at }}}</p>
                            <a href="#" class="secondary-content"><i class="mdi-editor-mode-edit"></i> Edit</a>
                        </li>
                        <li class="collection-item"><h5 class="blue-grey-text text-darken-2">Game Stats</h5></li>
                        <li class="collection-item avatar">
                            <i class="mdi-image-grid-on circle cyan accent-4"></i>
                            <span class="title">3x3 Puzzle</span>
                            <p>Best time: <span class="teal-text text-darken-3">20 min</span></p>
                            <p>Fewest moves: <span class="teal-text text-darken-3">80</span></p>
                            <p>Current rank: <span class="teal-text text-darken-3">5th</span></p>
                        </li>
                        <li class="collection-item avatar">
                            <i class="mdi-image-grid-on circle purple accent-4"></i>
                            <span class="title">4x4 Puzzle</span>
                            <p>Best time: <span class="teal-text text-darken-3">40 min</span></p>
                            <p>Fewest moves: <span class="teal-text text-darken-3">160</span></p>
                            <p>Current rank: <span class="teal-text text-darken-3">10th</span></p>
                        </li>
                        <li class="collection-item avatar">
                            <i class="mdi-image-grid-on circle pink accent-4"></i>
                            <span class="title">5x5 Puzzle</span>
                            <p>Best time: <span class="teal-text text-darken-3">1 hr</span></p>
                            <p>Fewest moves: <span class="teal-text text-darken-3">320</span></p>
                            <p>Current rank: <span class="teal-text text-darken-3">20th</span></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
@stop
