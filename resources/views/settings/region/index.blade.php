@extends('layouts.app')

@section('content')
    <div class="col-md-12 ">
        <div  class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="fa fa-table"></i>
                    Region
                    <a href="{{ url('/settings/region/create') }}" class="btn btn-primary btn-sm" title="Add New Region">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                    <div class="bars pull-right">
                        <a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Maximize"></i></a>
                        <a href="#"><i class="minimize fa fa-chevron-down" data-toggle="tooltip" data-placement="bottom" title="Collapse"></i></a>
                    </div>
                </div>
            </div>
            <div class="panel-body">

                <table class="table table-striped table-bordered width-100 cellspace-0" >
                    <thead>
                        <tr>
                            <th>Region Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($region as $item)
                        <tr>
                            <td>{{ $item->name }}</td>

                            <td>
                            <a href="{{ url('/settings/region/' . $item->id) }}" title="View Region"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                            <a href="{{ url('/settings/region/' . $item->id . '/edit') }}" title="Edit Region"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                            {!! FORM::open([
                            'method'=>'DELETE',
                            'url' => ['/settings/region', $item->id],
                            'style' => 'display:inline'
                            ]) !!}
                            {!! FORM::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete Region',
                            'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                            {!! FORM::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $region->render() !!} </div>
            </div>
        </div><!-- end panel -->
    </div><!-- end .col-md-12 -->

@endsection
