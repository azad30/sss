@extends('layouts.auth')

@section('content')
    <div id="sign-form" class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h2>REGISTER</h2>
                    </div>
                    <hr>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <fieldset>

                            <div class="spacing hidden-md"></div>

                            <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div  class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Enter name" value="{{ old('name') }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="spacing"></div>

                            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div  class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input id="email" type="email" class="form-control" name="email" placeholder="Enter e-mail" value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="spacing"></div>

                            <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div  class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Enter password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="spacing"></div>

                            <div class="">
                                <div  class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Enter re-type password" required>
                                </div>
                            </div>

                            <div class="spacing"></div>

                            <button type="submit" class="btn btn-success btn-sm  pull-right">Register</button>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
