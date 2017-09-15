@extends('layouts.app')
@section('content')
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"><a href="{{ url('/settings/branch') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a> - Edit Branch {{ $branch->id }}</div>
            <div class="panel-body">
                <br />
                <br />

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                {!! FORM::model($branch, [
                    'method' => 'PATCH',
                    'url' => ['/settings/branch', $branch->id],
                    'class' => 'form-horizontal',
                    'files' => true
                ]) !!}

                @include ('settings.branches.form', ['submitButtonText' => 'Update'])

                {!! FORM::close() !!}

            </div>
        </div>
    </div>
@endsection
