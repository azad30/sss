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

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="spacing hidden-md"></div>
                            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div  class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input id="email" type="email" class="form-control" placeholder="Enter Email" name="email" value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="spacing"></div>
                            <button type="submit" class="btn btn-success btn-sm  pull-right">Send Password Reset Link</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
