@extends('layouts.auth')

@section('content')
    <div id="sign-form" class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h2>RESET PASSWORD</h2>
                    </div>
                    <hr>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                        <fieldset>
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="spacing hidden-md"></div>

                            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">

                                <div  class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input id="email" type="email" class="form-control" placeholder="Enter E-mail" name="email" value="{{ $email or old('email') }}" required autofocus>
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
                                    <input id="password" type="password" class="form-control" placeholder="Enter Password" name="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="spacing"></div>

                            <div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <div  class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input id="password-confirm" type="password" class="form-control" placeholder="Enter Confirm Password" name="password_confirmation" required>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="spacing"></div>

                            <button type="submit" class="btn btn-success btn-sm  pull-right">Reset Password</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
