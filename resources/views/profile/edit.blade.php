@extends('layouts.app')
@section('content')
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ url('/profile') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a> - Edit My Profile</div>
                <div class="panel-body">
                    <br />
                    <br />
                    {!! FORM::open(['url' => '/profile/update', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('user.profile.form')

                    {!! FORM::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
