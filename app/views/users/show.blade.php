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
                            <div class="row">      
                                <div class="col s12 m9">
                                    <div class="row">   
                                        <div class="col s12">
                                            <span class="title">3x3 Puzzle</span>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col s6"> 
                                            <p>Best time: <span class="teal-text text-darken-3">{{{ $userBestTime3x3 }}}</span></p>
                                            <p>Current rank: <span class="teal-text text-darken-3">{{{ $timeRank3x3 }}}</span></p> 
                                        </div>
                                        <div class="col s6">
                                            <p>Least moves: <span class="teal-text text-darken-3">{{{ $userBestMoves3x3 }}}</span></p>
                                            <p>Current rank: <span class="teal-text text-darken-3">{{{ $movesRank3x3 }}}</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m3">
                                    <button class="btn waves-effect waves-light level cyan accent-4">Play</button>
                                </div>
                            </div>
                        </li>
                        <li class="collection-item avatar">
                            <i class="mdi-image-grid-on circle purple accent-4"></i>
                            <div class="row">      
                                <div class="col s12 m9">
                                    <div class="row">   
                                        <div class="col s12">
                                            <span class="title">4x4 Puzzle</span>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col s6"> 
                                            <p>Best time: <span class="teal-text text-darken-3">{{{ $userBestTime4x4 }}}</span></p>
                                            <p>Current rank: <span class="teal-text text-darken-3">{{{ $timeRank4x4 }}}</span></p> 
                                        </div>
                                        <div class="col s6">
                                            <p>Least moves: <span class="teal-text text-darken-3">{{{ $userBestMoves4x4 }}}</span></p>
                                            <p>Current rank: <span class="teal-text text-darken-3">{{{ $movesRank4x4 }}}</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m3">
                                    <button class="btn waves-effect waves-light level purple accent-4">Play</button>
                                </div>
                            </div>
                        </li>
                        <li class="collection-item avatar">
                            <i class="mdi-image-grid-on circle pink accent-4"></i>
                            <div class="row">      
                                <div class="col s12 m9">
                                    <div class="row">   
                                        <div class="col s12">
                                            <span class="title">5x5 Puzzle</span>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col s6"> 
                                            <p>Best time: <span class="teal-text text-darken-3">{{{ $userBestTime5x5 }}}</span></p>
                                            <p>Current rank: <span class="teal-text text-darken-3">{{{ $timeRank5x5 }}}</span></p> 
                                        </div>
                                        <div class="col s6">
                                            <p>Least moves: <span class="teal-text text-darken-3">{{{ $userBestMoves5x5 }}}</span></p>
                                            <p>Current rank: <span class="teal-text text-darken-3">{{{ $movesRank5x5 }}}</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m3">
                                    <button class="btn waves-effect waves-light level pink accent-4">Play</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
@stop
