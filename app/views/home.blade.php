@extends('layouts.master')

@section('title')
    <title>TyleNinja</title>
@stop

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

            {{-- Hero Graphics --}}
            <svg class="ninja hide-on-small-and-down" xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="434.9" height="285.7" viewBox="0 0 434.9 285.7" xml:space="preserve"><style type="text/css">
                .st0{fill:#263238;}
                .st1{fill:#455A64;}
            </style><path class="st1" d="M199.5 11c-3.8 4.6-6 10.9-6 16.5 0 0.5 0.2 0.8 0.2 1.3 -17.2-3.5-37.6-6.2-58.3-5.7 -43.2 1.1-65.7 13.9-76.3 22.8 -3.5-0.9-17-4.5-17-4.5l-3.4 22.7c0 0 10.3 3.4 14.7 4.8 -1.1 6.4-2.2 14.7-3.2 22.4 -0.9 6.8-2 15.2-2.5 17.2 -0.7 0.8-1.4 1.7-1.4 1.7l1.5 3.1c2.3 4.8 10.9 18.9 34.1 31.6 -3.9 0.1-9.6 0.3-9.6 0.3l-7.2 0.1c0 0 1.2 4 1.8 5.6 -15.7 0-32.1 0.1-34.9 0.3h0l-2.5 0.1c-9.6 0.2-17.9 0.7-21.3 5.5 -0.9 1.3-1.4 2.8-1.4 4.4 0 0.9 0.2 1.8 0.5 2.7 1.9 5.3 8.8 10.8 17 16.9 0 0 1.2 1 2.2 1.7 0 0.1 0 0.7 0 1 0 3.3 0.2 8.3 3.7 12.7 3.9 5 12.2 5.7 23.7 6.7 7.3 0.7 14.9-2 18.1-3.2 4.4 0.5 12.2 1.1 16.1-0.1 0.9-0.3 1.8-0.8 2.7-1.2 7.9 6.9 15.7 9.7 16.1 9.9l1.3 0.5c0 0 61.5-9.7 72.3-11.4 -0.1 7.9-0.2 25.4-0.2 25.4l1.6 1.6c0.1 0.1 2.9 2.8 7.3 6.1 -0.1 2.4-0.1 4.7-0.1 6.9 0 43.4 12 44.6 16.1 45 23.9 2.4 50.5-22.1 62.3-34.4 16.1-0.6 30.6-2.7 48.6-5.5 0 0 1.2-0.2 2.2-0.3 44.8 13.8 72.7 18.6 82.8 14.4 4-1.7 6.8-4.8 8-9 0.4-1.6 0.6-3.2 0.6-5 0-14.4-13.2-35.6-22.1-48.3 -0.1-0.4-0.2-0.7-0.2-0.7 -2-4.8-9.6-11.7-16.7-17.4 0.3 0 3.3-0.3 3.3-0.3l1.3-1.2c0.3-0.2 2.3-2.1 4.8-5.6 5.1-0.6 9.5-1.2 12.6-2.1l5.5-1.3c4.8-1 9.3-2 13.2-4.8 3.1-2.2 4.5-5.2 4.9-8 1.5-0.3 3.2-0.7 5-1.3 4.2-1.3 7.4-4.6 8.7-9 0.3-1.2 0.5-2.4 0.5-3.6 0-2.9-1-5.7-2.9-7.9 -1.5-1.7-5.6-6-31.4-10.1 0 0 1.3-6.1 1.3-6.1l-6.2-0.6c-0.2 0-21.5-2-49.5-2.1 -0.3-1.6-0.7-3.1-0.7-3.1 -1.4-4.7-4.4-8-8.6-9.7 -6.2-2.5-14.1-0.7-20.4 1.6 0-0.2 0-0.3 0-0.5 0-6.9-2.2-16.2-10-27.5C278.2 37.8 228.2 6.3 215.3 4.4 209.4 3.5 203.7 5.8 199.5 11zM32.6 162.2l-0.1 0L32.6 162.2z"/><path class="st0" d="M388.6 202.8c0 0-5 13.3-24.4 25.8 -12.8 8.2-30.4 12.8-30.4 12.8s49.8 16.4 65.1 9.9C417.6 243.6 388.6 202.8 388.6 202.8zM12.4 162.1c2.1 5.9 18.2 16 19.2 17.5 1 1.6-1 8.2 2.8 13.1 2.4 3.1 10.6 3.8 19.9 4.7 7.8 0.7 16.8-3.4 16.8-3.4s11.5 1.4 15.3 0.2c1.8-0.6 3.6-1.4 5.4-2.4 8 8 16.9 11.2 16.9 11.2l77.3-12.2 -0.2 29.6c0 0 17 17.1 39.8 19.9 39.8 5 60.3 1.2 95.1-4.1 25.6-3.9 66.7-28.3 61.6-40.7 -2.9-7.2-26.3-23.7-26.3-23.7l15.7-1.4c0 0 2.4-2.1 5.4-6.6 4.1-0.4 10-1.1 14.3-2.2 7.1-1.9 12.7-2.2 16.8-5.2s2.6-8.2 2.6-8.2 4.1-0.4 9-1.9c4.9-1.5 6.9-7.9 3.7-11.6 -4-4.6-24.6-7.9-33.9-9.1 0.8-3.5 1.3-5.8 1.3-5.8s-18.7-2.3-49.3-2.2c2 15.9-5 28.4-19.7 34.2 -16.8 6.6-28.9-5.7-34.1-12.4 0.9-0.5 1.3-0.7 1.3-0.7s12.7 16.6 31.2 9.3c18.5-7.3 19.5-24.2 15.6-37.3 -4.7-15.8-31.7 0.1-31.7 0.1s8.7-12.4-6.5-34.6c-23.5-34.2-72.1-64.6-83.3-66.3 -11.2-1.7-17.5 13.9-15 21.2 0.6 1.6 5.4 2.8 13.3 5.5 18.7 6.5 23.5 9.6 23.5 9.6S186.1 27.3 135.5 28.6c-45.7 1.2-67.2 16-75.1 23.3l-13.8-3.6 -1.8 12 27.5 9.1c-2.1 1.6-3.5 4.2-3.6 7.1 -0.2 5.1 3.6 9.4 8.5 9.6 4.9 0.2 9-3.8 9.2-8.9 0-1.1-0.1-2.2-0.5-3.3l9.7 3.2 2.6-12.4 -30.1-9.7c35.3-2.2 69.1 2.2 98.9 9.7l-52.1 4.7 0.6 10 12-0.2c-1.2 1.7-1.9 3.8-2 6.1 -0.2 6.2 4.3 11.4 10.2 11.6 5.9 0.2 10.9-4.6 11.1-10.8 0.1-2.7-0.7-5.1-2.1-7.1l40.3-0.5 -1.2-9.1c57.9 17.4 97.4 44.4 97.9 49.4 0.8 8.2-158.7-14.8-191.6-14.4 -25.8 0.4-34.8 4.6-37.5 6.5 3 6.3 26.2 46.7 125.5 51.3 40 1.9 72.5-7.3 91.8-14.7 -14.3 7.5-30.1 14.4-54.7 18.6 1.9 5.5 5.1 20.3 12.7 35.5 1.6 3.2 2.2 5.8 3.6 8.1l-4 0.8c-1.2-2.1-2.5-4.4-4-7 -9.8-17.6-15-29.9-17.3-35.8 -9 1.1-18.6 1.6-28.6 1.1 -37.8-1.8-59-9.3-78.5-18.4 -15.3 0.3-26.7 0.3-26.7 0.3s0.6 2.1 1.8 5.7c-11.8 0-38.6 0.1-42 0.3C27.9 156.9 10.3 156.1 12.4 162.1zM303.8 134.6c0 0 0.6-8.9 10.3-15.4 7.4-5 13 1.3 13 1.3l-0.1 0.1c0 0-7-0.4-13.4 3.9C309.6 127 303.8 134.6 303.8 134.6zM380.8 157.2c0.8-1.8 1.7-3.8 2.4-6.1 1.8-5.3 3.9-14.2 5.5-21.2 6.7 1.3 24.8 4.8 26.7 5.9 4.5 2.6 3.4 6 0 6.4 -3.4 0.4-14.6-1.9-14.6-1.9l-5.2-0.4c0 0 10.8 4.5 11.2 7.1 0.4 2.6 0 4.9-5.6 7.1C397.2 155.7 386.8 156.7 380.8 157.2zM24.2 162.8c2.6-1.4 37-0.8 52.2-0.4 1.5 4.3 3.6 9.6 6.1 15.6 1.2 2.9 2.7 5.4 4.3 7.8 -1.6 0.5-3.3 0.9-4.6 0.8 -8-0.5-13.4-3.7-14.2-3.7 -0.8 0-5.4 5.7-5.4 5.7s-6.2-0.3-10.6-0.8c-4.4-0.5-9-2.1-10.8-5.2 -1.8-3.1-1.2-4.2 2-6.4 3.9-2.6 15.7-6.7 15.7-6.7s-15.2 0-17.8 1c-2.6 1-8.5 2.6-8.5 2.6S20.8 164.6 24.2 162.8zM258.8 250.1c0 0-21.8 0-36.7-3 -13.4-2.7-26.8-10.9-26.8-10.9s-4.5 39.1 10.4 40.6C234 279.6 258.8 250.1 258.8 250.1z"/></svg>

            <svg class="ninja-star hide-on-small-and-down" xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="182" height="109" viewBox="0 0 182 109" xml:space="preserve"><style type="text/css">
                .st0{fill:#263238;}
                .st1{fill:#455A64;}
            </style><path class="st1" d="M48.8 2.6l-4.6 2.9c0 0 2.1 4.9 2.4 5.4 0.5 1.9 0.7 3.7 0.7 5.4 0 3.5-1 6.5-2.8 8.7 -2 2.4-5 3.4-8.8 3.1 -8.7-0.5-16.1 0.4-23.4 1.2l-7.8 0.8 -0.2 5.5c8.2 1.3 14.8 5 17.3 9.6 1.6 2.9 1.5 6.3-0.1 9.8 -1.7 3.6-3.8 7-5.8 10.3 -3.4 5.5-6.9 11.2-8.5 17.9l5.1 2c3.3-6.1 11.1-11 16.9-10.7 2.8 0.1 4.8 1.5 5.9 4.1 3.6 8.3 8.6 15.2 13.5 21.8l4.4 6.1 4.9-2.4c-2.2-6.8-3.7-16.4-0.4-21 1.3-1.9 3.4-2.8 6.2-2.8l7.7 0.3c8.1 0.4 16.4 0.8 24.9-1.9 0 0 0 0 0.1 0l0 0c0.1 0 0.3 0 0.4-0.1l-1.3-5.3c-6.2 1-12.7-3.4-17-8.5 0.3-0.1 0.4-0.2 0.5-0.3 1.1-0.1 100.4-6 100.4-6l0-5.5c0 0-41.7-1.8-69.7-3.1 4.3-0.7 10.6-1.7 10.6-1.7l-0.3-5.5c0 0-24.6-0.8-30.8-1.1 1-2.3 1.9-4.7 1.9-4.7 1.2-3.3 2.3-6.4 4-9.2l-4.7-2.9c-3.9 6.1-9.9 9.7-15.7 9.4 -4.4-0.2-8.1-2.7-10.4-7.2l-3.3-6.1C57.5 14.8 54 8.3 48.8 2.6z"/><path class="st0" d="M24 56.2c-4.7 10-11.6 17.5-14 27.6 5.7-10.4 22.8-17.8 27.8-6.4 4.6 10.5 11.5 18.8 17.6 27.5 -3.6-10.9-5-27.2 8.5-27.4 10.2 0.1 21.3 2.1 32.2-1.5 -8.1 1.3-16.2-4.5-20.9-10.9 0.3-0.7 0.6-1.4 0.8-2.1l2.4-1.2 100.9-6 -96.6-4.3 37.2-6 -34.8-1.2c2.9-5.7 4.4-12.3 7.6-17.9 -8.1 12.6-24.1 15-30.8 2.1 -4.7-8.2-8.4-16.7-15-24.1 0.8 1.9 1.7 3.8 2.5 5.7 3.1 12.3-3 21.7-13.7 20.7 -11.6-0.6-21 1.2-30.8 2.1C18.2 35 29.8 43.5 24 56.2zM46.5 54c0-3.4 2.8-6.2 6.2-6.2s6.2 2.8 6.2 6.2c0 3.4-2.8 6.2-6.2 6.2S46.5 57.4 46.5 54z"/></svg>

            <div class="hero-tile-grid hide-on-med-and-down" aria-hidden="true">
                <div id="one" class="hero-tile valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">1</p>
                </div>
                <div id="two" class="hero-tile valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">2</p>
                </div>
                <div id="three" class="hero-tile valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">3</p>
                </div>
                <div id="four" class="hero-tile valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">4</p>
                </div>
                <div id="five" class="hero-tile valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">5</p>
                </div>
                <div id="seven" class="hero-tile valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">7</p>
                </div>
                <div id="eight" class="hero-tile valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">8</p>
                </div>
                <div id="six" class="hero-tile valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">6</p>
                </div>
            </div>

            <div class="hero-tile-large-grid" aria-hidden="true">
                <div id="one-large" class="hero-tile-large valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">1</p>
                </div>
                <div id="two-large" class="hero-tile-large valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">2</p>
                </div>
                <div id="three-large" class="hero-tile-large valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">3</p>
                </div>
                <div id="four-large" class="hero-tile-large valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">4</p>
                </div>
                <div id="five-large" class="hero-tile-large valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">5</p>
                </div>
                <div id="six-large" class="hero-tile-large valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">6</p>
                </div>
                <div id="seven-large" class="hero-tile-large valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">7</p>
                </div>
                <div id="eight-large" class="hero-tile-large valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">8</p>
                </div>
                <div id="nine-large" class="hero-tile-large valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">9</p>
                </div>
                <div id="ten-large" class="hero-tile-large valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">10</p>
                </div>
                <div id="eleven-large" class="hero-tile-large valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">11</p>
                </div>
                <div id="twelve-large" class="hero-tile-large valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">12</p>
                </div>
                <div id="thirteen-large" class="hero-tile-large valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">13</p>
                </div>
                <div id="fourteen-large" class="hero-tile-large valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">14</p>
                </div>
                <div id="fifteen-large" class="hero-tile-large valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">15</p>
                </div>
            </div>

            <div class="hero-tile-largest-grid" aria-hidden="true">
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">1</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">2</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">3</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">4</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">5</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">6</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">7</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">8</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">9</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">10</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">11</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">12</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">13</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">14</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">15</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">16</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">17</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">18</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">19</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">20</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">21</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">22</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">23</p>
                </div>
                <div class="hero-tile-largest valign-wrapper">
                    <p class="splash-tile-num blue-grey-text text-darken-3 valign">24</p>
                </div>
            </div>
        </section>

        <section class="no-pad-bot teal lighten-1" id="about">
            <div class="container">
                <div class="row no-marg-bot pad-bot blue-grey-text text-darken-4">
                    <div class="col s12">
                        <h3 class="center">About the Game</h3>
                    </div>
                    <div class="col s12 l6">
                        <p class="flow-text"><span class="name">TyleNinja</span> is a sliding-tile puzzle game with 3 difficulty levels designed to test your inner focus and improve mental problem-solving skills. Challenge yourself and your friends to achieve the fastest time or fewest moves for each puzzle &mdash; 3x3, 4x4, and 5x5.</p>
                        <p class="flow-text">Puzzles are randomly generated and successfully solved when the tiles are arranged in numerical order, from left to right, ending with the empty space in the bottom-right corner.</p>
                        <p class="flow-text">Your best stats for each level can be viewed from your profile page. Once there, you may also view the Leaderboard for each level to see how you rank compared to other players.</p>
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
