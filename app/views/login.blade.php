@extends('layouts.master')

@section('title')
    <title>Log in | TyleNinja</title>
@stop

@section('content')
<div class="row pad-bot">
    <div class="col s12 m8 offset-m2 l4 offset-l4 center-align">
        <div class="card-panel white center-align">
            <h5 class="blue-grey-text text-darken-2">Log in</h5>
            <div class="row">
                {{ Form::open(array('action' => 'HomeController@doLogin', 'class' => 'col s12')) }}
                  <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('email_or_username', 'Email or Username') }}
                        {{ Form::text('email_or_username') }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password') }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12">
                        <button type="submit" class="btn waves-effect modal-button">Log in</button>
                    </div>
                  </div>
                {{ Form::close() }}
            </div>
            <div class="row">
                <div class="divider"></div>
                    <p class="blue-grey-text text-darken-2 or-login">Log in with&nbsp;&nbsp;
                        <a href="#" class="btn-floating waves-effect fb-color white-text"><i class="fa fa-facebook social"></i></a>
                        &nbsp;&nbsp;or&nbsp;&nbsp;
                        <a href="#" class="btn-floating waves-effect google-color white-text"><i class="fa fa-google social"></i></a>
                    </p>
            </div>
        </div>

        <a href="{{{ action('UsersController@create') }}}" class="btn-flat teal-text text-lighten-3">Create an Account</a>

    </div>
</div>
@stop
