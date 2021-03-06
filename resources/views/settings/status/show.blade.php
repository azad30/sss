@extends('layouts.app')

@section('content')
    <div class="col-md-12 ">
        <div  class="panel panel-default">
            <div class="panel-heading">Status {{ $status->id }}</div>
            <div class="panel-body">

                <a href="{{ url('/settings/status') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a>
                <a href="{{ url('/settings/status/' . $status->id . '/edit') }}" title="Edit Status"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                {!! FORM::open([
                    'method'=>'DELETE',
                    'url' => ['/settings/status', $status->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! FORM::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete Status',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                {!! FORM::close() !!}
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>ID</th><td>{{ $status->id }}</td>
                            </tr>
                            <tr>
                                <th>Status Name</th><td>{{ $status->name }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
