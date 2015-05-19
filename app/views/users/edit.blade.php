@extends('layouts.master')

@section('title')
    <title>Edit Profile | TyleNinja</title>
@stop

@section('content')
        <div class="pad-bot">
            <div class="row">
                <div class="col s12 m8 offset-m2 l8 offset-l2">
                    <div class="card z-depth-2 grey lighten-5">
                        <div class="card-content">
                            <div class="row no-marg-bot">
                                <div class="col s12">
                                    <h5 class="blue-grey-text text-darken-2">Edit Profile</h5>
                                </div>
                                <div class="col s12">
                                    <div class="user collection no-marg-top">
                                        <div class="col s12 l4">
                                            <img src="/img/ninja_avatar.jpg" alt="" class="circle profile-avatar">
                                            <h6 class="user-title">{{{ Auth::user()->username }}}</h6>
                                        </div>
                                        <div class="col s12 l4 user-info-col">
                                            <p>{{{ Auth::user()->first_name }}} {{{ Auth::user()->last_name }}}</p>
                                            <p class="grey-text text-darken-1">{{{ Auth::user()->email }}}</p>
                                            <p class="grey-text">Joined {{{ Auth::user()->created_at }}}</p>
                                        </div>


                                        <div class="col s12">

                                                <div class="section no-pad-bot no-marg-top">
                                                    <div class="divider"></div>
                                                    <h6 class="medium">Edit Information</h6>
                                                    <div class="section no-pad-bot">
                                                        <div class="row">
                                                            {{ Form::model(Auth::user(), array('action' => array('UsersController@putUpdate', Auth::user()->id), 'method' => 'PUT')) }}
                                                                <div class="row">
                                                                    <div class="input-field col s6">
                                                                        {{ Form::label('first_name', 'First Name') }}
                                                                        {{ Form::text('first_name', Input::old('first_name')) }}
                                                                        {{ $errors->first('first_name', '<span class="red-text text-darken-1"><i class="mdi-navigation-expand-less"></i> :message</span>') }}
                                                                    </div>

                                                                    <div class="input-field col s6">
                                                                        {{ Form::label('last_name', 'Last Name') }}
                                                                        {{ Form::text('last_name', Input::old('last_name')) }}
                                                                        {{ $errors->first('last_name', '<span class="red-text text-darken-1"><i class="mdi-navigation-expand-less"></i> :message</span>') }}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        {{ Form::label('username', 'Username') }}
                                                                        {{ Form::text('username', Input::old('username')) }}
                                                                        {{ $errors->first('username', '<span class="red-text text-darken-1"><i class="mdi-navigation-expand-less"></i> :message</span>') }}
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        {{ Form::label('email', 'Email') }}
                                                                        {{ Form::email('email', Input::old('email')) }}
                                                                        {{ $errors->first('email', '<span class="red-text text-darken-1"><i class="mdi-navigation-expand-less"></i> :message</span>') }}
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        {{ Form::label('password', 'Password') }}
                                                                        {{ Form::password('password') }}
                                                                        {{ $errors->first('password', '<span class="red-text text-darken-1"><i class="mdi-navigation-expand-less"></i> :message</span>') }}
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        {{ Form::label('password_confirmation', 'Confirm Password') }}
                                                                        {{ Form::password('password_confirmation') }}
                                                                        {{ $errors->first('password_confirmation', '<span class="red-text text-darken-1"><i class="mdi-navigation-expand-less"></i> :message</span>') }}
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col s12">
                                                                        <button type="submit" class="btn waves-effect create-button">Update</button>
                                                                    </div>
                                                                </div>

                                                            {{ Form::close() }}
                                                        </div>
                                                    </div>
                                                </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@stop
