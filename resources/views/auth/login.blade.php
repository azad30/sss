@extends('layouts.auth')

@section('content')

<div id="sign-form" class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h2>LOGIN</h2>
                    </div>
                    <hr>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <fieldset>

                            <div class="spacing hidden-md"></div>
                            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div  class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail" required autofocus />
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
                                    <input id="password" type="password" class="form-control" name="password" placeholder="password" required />
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="spacing"></div>

                            {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}

                            <button type="submit" class="btn btn-success btn-sm  pull-right">Sign In</button>

                        </fieldset>
                    </form>
                    <hr/>
                    <a href="{{ route('password.request') }}" class="grey">Forget Password?</a>
                </div>

            </div>

        </div>
    </div>


@endsection
