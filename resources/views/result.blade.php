@extends('layouts.app')
@section('content')
    {{--<table class="table table-striped table-bordered table-responsive width-100 cellspace-0" >--}}
        {{--<thead>--}}
        {{--<tr>--}}
            {{--<th>SL NO</th>--}}
            {{--<th>Req. ID</th>--}}
            {{--<th>Region Name</th>--}}
            {{--<th>Zone Name</th>--}}
            {{--<th>Branch Name</th>--}}
            {{--<th>Branch Code</th>--}}
            {{--<th>Date</th>--}}
            {{--<th>Problem Name</th>--}}
            {{--<th>Status</th>--}}
            {{--<th>Actions</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
    {{--@foreach($searches as $serach)--}}
        {{--<tr>--}}
            {{--<td>{{$serach->id}}</td>--}}
            {{--<td>2</td>--}}
            {{--<td>{{ $getregionName }}</td>--}}
            {{--<td>{{ $getZoneName }}</td>--}}
            {{--<td>{{$serach->name}} </td>--}}
            {{--<td>00{{$serach->id}}</td>--}}
            {{--<td>date</td>--}}
            {{--<td>Problem name</td>--}}
            {{--<td>pending</td>--}}
            {{--<td>show</td>--}}
        {{--</tr>--}}
    {{--@endforeach--}}
    {{--</table>--}}

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
        <?php   $i = 1; ?>
        @foreach($report as $item)
            <tr>
                {{--<td>{{ ++$sl }}</td>--}}
                <td>{{ $i++ }}</td>
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
@endsection