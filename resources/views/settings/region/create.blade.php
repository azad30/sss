@extends('layouts.app')

@section('content')
    <div class="col-md-12 ">
        <div  class="panel panel-default">
            <div class="panel-heading">
                <a class="btn btn-warning btn-xs" href="{{ url('/settings/region') }}" title="Back" class=""><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                - Create New Region
            </div>
            <div class="panel-body">
                @if ($errors->any())
                    <div class="alert alert-danger" align="center" id="error-alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <ul style="list-style-type: none;">
                            @foreach ($errors->all() as $error)
                                <li >{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! FORM::open(['url' => '/settings/region', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('settings.region.form')

                {!! FORM::close() !!}

            </div>
        </div>
    </div>
@endsection
