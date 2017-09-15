@extends('layouts.app')

@section('content')
    <div class="col-md-12 ">
        <div  class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="fa fa-table"></i>
                    Zone
                    <a href="{{ url('/settings/zone/create') }}" class="btn btn-primary btn-sm" title="Add New Zone">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                    <div class="bars pull-right">
                        <a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Maximize"></i></a>
                        <a href="#"><i class="minimize fa fa-chevron-down" data-toggle="tooltip" data-placement="bottom" title="Collapse"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered width-100 cellspace-0" >
                        <thead>
                            <tr>
                                <th>ID</th><th>Zone Name</th><th>Region Name</th><th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($zone as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>

                                @if(isset($item->region->id))
                                <td>
                                    {{ $item->region->name }}
                                </td>
                                @else
                                <td class="bg-danger">
                                    Deleted
                                </td>
                                @endif

                                <td>
                                    <a href="{{ url('/settings/zone/' . $item->id) }}" title="View Zone"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                    <a href="{{ url('/settings/zone/' . $item->id . '/edit') }}" title="Edit Zone"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                    {!! FORM::open([
                                        'method'=>'DELETE',
                                        'url' => ['/settings/zone', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! FORM::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => 'Delete Zone',
                                                'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                    {!! FORM::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $zone->render() !!} </div>

                </div>
            </div>
        </div>
    </div>
@endsection
