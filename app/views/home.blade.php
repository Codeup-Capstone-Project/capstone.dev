@extends('layouts.master')

@section('content')
        <section class="hero no-pad-bot" id="main-splash">
            <div class="row hero center">
                <div class="col s12 center-align">
                    <h2 class="white-text thin plug">Bone-crushing tile puzzles!</h2>
                    <a href="{{{ action('GameController@getIndex') }}}" id="play-button" class="btn-large waves-effect waves-teal blue-grey lighten-5 call main">Start Playing!</a>
                </div>
            </div>
            <a class="floating-absolute-right btn-floating btn-large waves-effect waves-teal blue-grey lighten-5 hide-on-med-and-down" id="scroll-to-about">
                <i class="mdi-navigation-expand-more"></i>
            </a>
            <div class="ninja hide-on-small-only"></div>
        </section>

        <section class="no-pad-bot teal lighten-1" id="about">
            <div class="container">
                <div class="row no-marg-bot pad-bot blue-grey-text text-darken-4">
                    <div class="col s12">
                        <h3 class="center">About the Game</h3>
                    </div>
                    <div class="col s12 l6">
                        <p class="flow-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus doloribus, consequatur numquam quas nihil facilis corporis, quod voluptates possimus! Libero obcaecati possimus, ab, beatae incidunt voluptatum vel, necessitatibus praesentium, adipisci cupiditate aut nobis! Perspiciatis, sit, qui dolorem, illo ab nam vel tempora maxime ea laboriosam, nemo dignissimos dolorum fugiat. Animi.</p>
                    </div>
                    <div class="col s12 center">
                        <a href="#" class="btn-large waves-effect waves-teal blue-grey lighten-5 call">Watch Tutorial</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="no-pad-bot teal lighten-2" id="creators">
            <div class="container">
                <div class="row no-marg-bot pad-bot blue-grey-text text-darken-4">
                    <div class="col s12">
                        <h3 class="center">The Creators</h3>
                    </div>
                    <div class="col s6 offset-s3 m4 offset-m4 l2">
                        <img src="img/justin.jpg" alt="" class="circle responsive-img img-marg">
                    </div>
                    <div class="col s12 m12 l4">
                        <p class="flow-text"><span class="name">Justin Dietert</span> lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aliquid dolores libero ullam aspernatur amet cum, iusto ratione repudiandae dolore doloribus! In ex earum ab.</p>
                    </div>
                    <div class="col s6 offset-s3 m4 offset-m4 l2">
                        <img src="img/jamie.jpg" alt="" class="circle responsive-img img-marg">
                    </div>
                    <div class="col s12 m12 l4">
                        <p class="flow-text"><span class="name">Jamie Haskell</span> lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aliquid dolores libero ullam aspernatur amet cum, iusto ratione repudiandae dolore doloribus! In ex earum ab.</p>
                    </div>
                </div>
            </div>
        </section>
@stop
