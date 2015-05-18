@extends('layouts.master')

@section('title')
    <title>Create an account | TyleNinja</title>
@stop

@section('content')
    <div class="row pad-bot">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card-panel white z-depth-2">
                <h5 class="blue-grey-text text-darken-2 center-align">Create an Account</h5>
                <div class="col s12">
                    <p class="teal-text text-accent-4">* <span class="grey-text text-lighten-1">= Required</span></p>
                </div>
                <div class="row">
                    {{ Form::open(array('action' => 'UsersController@postStore', 'class' => 'col s12')) }}
                      <div class="row">
                        <div class="input-field col s6">
                            {{ Form::label('first_name', 'First Name', ['class' => 'required']) }}
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
                            {{ Form::label('username', 'Username', ['class' => 'required']) }}
                            {{ Form::text('username', Input::old('username')) }}
                            {{ $errors->first('username', '<span class="red-text text-darken-1"><i class="mdi-navigation-expand-less"></i> :message</span>') }}
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                            {{ Form::label('email', 'Email', ['class' => 'required']) }}
                            {{ Form::email('email', Input::old('email')) }}
                            {{ $errors->first('email', '<span class="red-text text-darken-1"><i class="mdi-navigation-expand-less"></i> :message</span>') }}
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                            {{ Form::label('password', 'Password', ['class' => 'required']) }}
                            {{ Form::password('password') }}
                            {{ $errors->first('password', '<span class="red-text text-darken-1"><i class="mdi-navigation-expand-less"></i> :message</span>') }}
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                            {{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'required']) }}
                            {{ Form::password('password_confirmation') }}
                            {{ $errors->first('password_confirmation', '<span class="red-text text-darken-1"><i class="mdi-navigation-expand-less"></i> :message</span>') }}
                        </div>
                      </div>
                      <div class="row">
                        <div class="col s12">
                            <button type="submit" class="btn waves-effect create-button">Create</button>
                        </div>
                      </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@stop
