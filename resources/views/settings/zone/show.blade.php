@extends('layouts.app')

@section('content')
    <div class="col-md-12 ">
        <div  class="panel panel-default">
            <div class="panel-heading">Zone {{ $zone->id }}</div>
            <div class="panel-body">

                <a href="{{ url('/settings/zone') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a>
                <a href="{{ url('/settings/zone/' . $zone->id . '/edit') }}" title="Edit Zone"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                {!! FORM::open([
                    'method'=>'DELETE',
                    'url' => ['/settings/zone', $zone->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! FORM::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete Zone',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                {!! FORM::close() !!}
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>ID</th><td>{{ $zone->id }}</td>
                            </tr>
                            <tr><th> Zone Name </th><td> {{ $zone->name }} </td></tr>
                            <tr>
                                <th> Region Name </th>
                                @if(isset($zone->region->id))
                                <td>
                                    {{ $zone->region->name }}
                                </td>
                                @else
                                <td class="bg-danger">
                                    Deleted
                                </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
