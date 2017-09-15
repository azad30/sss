@extends('user.layouts.app')
@section('content')
    <br/>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div  class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="fa fa-table"></i>
                    Requests
                    <a href="{{ url('/request/create') }}" class="btn btn-primary btn-sm" title="Add New Request">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                    <div class="bars pull-right">
                        <button class="btn btn-info btn-xs" data-toggle="collapse" data-target="#filter-panel">Search <i class="fa fa-search-plus" aria-hidden="true"></i></button>
                        <a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Maximize"></i></a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div id="filter-panel" class="collapse filter-panel">
                    {!! FORM::open(['url' => '/request', 'method' => 'get', 'class' => 'form-inline']) !!}
                        <div class="form-group">
                            {!! FORM::label('per-page', 'Column') !!}
                            {!! FORM::select('per-page', [5 => 5, 10 => 10, 25 => 25, 50 => 50, 100 => 100, 500 => 500], 25, ['class' => 'form-control input-sm', 'id' => 'status']) !!}
                        </div>
                        <div class="form-group">
                            {!! FORM::label('from-date', 'Form Date') !!}
                            {!! FORM::date('from-date', null, ['class' => 'form-control input-sm', 'id' => 'from-date']) !!}
                        </div>
                        <div class="form-group">
                            {!! FORM::label('to-date', 'To Date') !!}
                            {!! FORM::date('to-date', null, ['class' => 'form-control input-sm', 'id' => 'to-date']) !!}
                        </div>
                        <div class="form-group">
                            {!! FORM::label('status', 'Status') !!}
                            {!! FORM::select('status', $status, null, ['class' => 'form-control input-sm', 'id' => 'status', 'placeholder' => 'Select Status']) !!}
                        </div>
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-default filter-col">
                                <i class="fa fa-search text-primary" aria-hidden="true"></i> Search
                            </button>
                        </div>
                    {!! FORM::close() !!}
                    <hr/>
                </div>
                <table class="table table-striped table-bordered width-100 cellspace-0" >
                    <thead>
                    <tr>
                        <th>Problem</th><th>Problem Type</th><th>Problem Date</th><th>Request Date</th><th>Status</th><th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($requests as $item)
                        <tr>
                            <td>{{ $item->problem_name }}</td>
                            @if(!empty($item->module_type))
                                <td>{{ $item->problem_type }} -> {{ $item->module_type }}</td>
                            @else
                                <td>{{ $item->problem_type }}</td>
                            @endif
                            <td>{{ \Carbon\Carbon::parse($item->problem_date)->format('Y-m-d') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</td>
                            @if(isset($item->status->name))
                                @if($item->status->id == 1)
                                    <td class="bg-warning">{{ $item->status->name }}</td>
                                @elseif($item->status->id == 2)
                                    <td class="bg-info">{{ $item->status->name }}</td>
                                @elseif($item->status->id == 3)
                                    <td class="bg-danger">{{ $item->status->name }}</td>
                                @elseif($item->status->id == 4)
                                    <td class="bg-success">{{ $item->status->name }}</td>
                                @else
                                    <td>{{ $item->status->name }}</td>
                                @endif

                            @else
                                <td class="bg-danger">Missing</td>
                            @endif
                            <td>
                                <a href="{{ url('/request/' . $item->id) }}" title="View Request"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                @if($item->status_id == 1)
                                    <a href="{{ url('/request/' . $item->id . '/edit') }}" title="Edit Request"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                    {!! FORM::open([
                                        'method'=>'DELETE',
                                        'url' => ['/request', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! FORM::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-xs',
                                            'title' => 'Delete Request',
                                            'onclick'=>'return confirm("Confirm delete?")'
                                    )) !!}
                                    {!! FORM::close() !!}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $requests->appends(['per-page' => Request::get('per-page'), 'form-date' => Request::get('from-date'), 'to-date' => Request::get('to-date'), 'status' => Request::get('status')])->render() !!} </div>
            </div>
        </div>
    </div>
</div>
@endsection