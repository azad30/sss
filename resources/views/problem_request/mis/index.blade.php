@extends('layouts.app')
@section('style')
    <style>
        /* CSS used here will be applied after bootstrap.css */
        .modal-header-success {
            color:#fff;
            padding:9px 15px;
            border-bottom:1px solid #eee;
            background-color: #5cb85c;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .modal-header-warning {
            color:#fff;
            padding:9px 15px;
            border-bottom:1px solid #eee;
            background-color: #f0ad4e;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .modal-header-danger {
            color:#fff;
            padding:9px 15px;
            border-bottom:1px solid #eee;
            background-color: #d9534f;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .modal-header-info {
            color:#fff;
            padding:9px 15px;
            border-bottom:1px solid #eee;
            background-color: #5bc0de;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .modal-header-primary {
            color:#fff;
            padding:9px 15px;
            border-bottom:1px solid #eee;
            background-color: #428bca;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
    </style>
@endsection
@section('content')
    <div class="col-md-12 ">
        <div  class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="fa fa-table"></i>
                    Problem Request
                    <div class="bars pull-right">
                        <button class="btn btn-info btn-xs" data-toggle="collapse" data-target="#filter-panel">Search <i class="fa fa-search-plus" aria-hidden="true"></i></button>
                        <a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Maximize"></i></a>
                        <a href="#"><i class="minimize fa fa-chevron-down" data-toggle="tooltip" data-placement="bottom" title="Collapse"></i></a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div id="filter-panel" class="collapse filter-panel">
                    <form method="get" action="{{url('search')}}" class="form-inline">
                        <div class="form-group">
                            <label for="from-date">Form Date</label>
                            <input type="date" name="from-date" id="from-date" class="form-control input-sm">
                        </div>
                        <div class="form-group">
                            <label for="to-date">To Date</label>
                            <input type="date" name="to-date" id="to-date" class="form-control input-sm">
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label for="branch">Branch</label>--}}
                            {{--<select name="branch" id="branch" class="form-control">--}}
                                {{--<option value="">Select Branch</option>--}}
                                {{--@foreach($branches as $branch)--}}
                                    {{--<option name="branchess" value="{{ $branch->id }}">{{ $branch->name }}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Select Status</option>
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pull-right">
                            <button type="submit" name="search" class="btn btn-default filter-col">
                                <i class="fa fa-search text-primary" aria-hidden="true"></i> Search
                            </button>
                        </div>
                    </form>
                    <hr/>
                </div>
                <table class="table table-striped table-bordered table-responsive width-100 cellspace-0" >
                    <thead>
                    <tr>
                        <th>SL NO</th>
                        <th>Req. ID</th>
                        <th>Region Name</th>
                        <th>Zone Name</th>
                        <th>Branch Name</th>
                        <th>Branch Code</th>
                        <th>Date</th>
                        <th>Problem Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($requests as $item)
                        <tr>
                            <td>{{ ++$sl }}</td>
                            <td>{{ $item->id }}</td>
                            @if(isset($item->user->branch->zone->region->id))
                                <td>{{ $item->user->branch->zone->region->name }}</td>
                            @else
                                <td class="bg-danger">Deleted</td>
                            @endif
                            @if(isset($item->user->branch->zone->id))
                                <td>{{ $item->user->branch->zone->name }}</td>
                            @else
                                <td class="bg-danger">Deleted</td>
                            @endif
                            @if(isset($item->user->branch->id))
                                <td>{{ $item->user->branch->name }}</td>
                            @else
                                <td class="bg-danger">Deleted</td>
                            @endif
                            @if(isset($item->user->branch->id))
                                <td>{{ $item->user->branch->id }}</td>
                            @else
                                <td class="bg-danger">Deleted</td>
                            @endif
                            <td>{{ Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</td>
                            <td>{{ $item->problem_name }}</td>
                            @if(isset($item->status->id))
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
                                <td class="bg-danger">Deleted</td>
                            @endif
                            <td>
                                <a href="{{ url('/problem_request/' . $item->id) }}" title="View Request"><button class="btn btn-primary btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                {{--<button type="button" class="btn btn-warning btn-xs" title="Open" data-toggle="modal" data-target="#openModal"><i class="fa fa-spinner fa-pulse fa-fw" aria-hidden="true"></i></button>--}}
                                {{--<button type="button" class="btn btn-info btn-xs" title="Pending" data-toggle="modal" data-target="#pendingModal"><i class="fa fa-refresh fa-spin fa-fw" aria-hidden="true"></i></button>--}}
                                {{--<button type="button" class="btn btn-danger btn-xs" title="Cancel" data-toggle="modal" data-target="#cancelModal"><i class="fa fa-ban" aria-hidden="true"></i></button>--}}
                                {{--<button type="button" class="btn btn-success btn-xs" title="Success" data-toggle="modal" data-target="#successModal"><i class="fa fa-check" aria-hidden="true"></i></button>--}}

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $requests->appends(['search' => Request::get('search'), 'branchess' => Request:: get('branchess')])->render() !!} </div>
            </div>
        </div><!-- end panel -->
    </div><!-- end .col-md-12 -->
    <!-- Modal -->
    <div class="modal fade" id="openModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header modal-header-warning">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Open</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="pendingModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header modal-header-info">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="cancelModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header modal-header-danger">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="successModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header modal-header-success">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

@endsection

