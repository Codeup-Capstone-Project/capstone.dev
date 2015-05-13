@extends('layouts.master')

@section('content')
    <div class="row pad-bot">
        <div class="col s12 m8 offset-m2 l4 offset-l4 center-align">
            <div class="card-panel white center-align">
                <h5 class="blue-grey-text text-darken-2">Create an Account</h5>
                <div class="row">
                    <form class="col s12">
                      <div class="row">
                        <div class="input-field col s12">
                          <label for="username">Username</label>
                          <input id="username" type="text" class="validate">
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <label for="email">Email</label>
                          <input id="email" type="email" class="validate">
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <label for="password">Password</label>
                          <input id="password" type="password" class="validate">
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <label for="confirm-password">Confirm Password</label>
                          <input id="confirm-password" type="password" class="validate">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col s12">
                            <button type="submit" class="btn waves-effect modal-button"><i class="mdi-navigation-arrow-forward left"></i>Create</button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
