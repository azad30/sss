@extends('layouts.app')
@section('content')
    <div class="col-md-12 ">
        <div  class="panel panel-default">
            <div class="panel-heading">User {{ $user->id }}</div>
            <div class="panel-body">
                <a href="{{ url('/settings/user') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a>

                @if (Auth::user()->role == 'superadmin')
                <a href="{{ url('/settings/user/' . $user->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                {!! FORM::open([
                    'method'=>'DELETE',
                    'url' => ['/settings/user', $user->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! FORM::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete User',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                {!! FORM::close() !!}
                @endif
                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>ID</th><td>{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th><td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>E-mail</th><td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Contact</th><td>{{ $user->contact }}</td>
                            </tr>
                            <tr>
                                <th>Address</th><td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <th>Department Name</th><td>{{ $user->department }}</td>
                            </tr>
                            <tr>
                                <th>Designation</th><td>{{ $user->designation }}</td>
                            </tr>
                            <tr>
                                <th>PIN</th><td>{{ $user->pin }}</td>
                            </tr>
                            <tr>
                                <th>Office</th><td>{{ $user->office }}</td>
                            </tr>
                            <tr>
                                <th>Office Address</th><td>{{ $user->officeaddress }}</td>
                            </tr>
                            @if($user->role == '')
                                <tr>
                                    <th>role</th><td>Client</td>
                                </tr>
                            @else
                                <tr>
                                    <th>role</th><td>{{ $user->role }}</td>
                                </tr>
                            @endif
                            @if($user->status == '')
                                <tr>
                                    <th>Status</th><td>Active</td>
                                </tr>
                            @else
                                <tr>
                                    <th>Status</th><td>{{ $user->status }}</td>
                                </tr>
                            @endif
                            @if(isset($user->branch->zone->region->id))
                                <tr>
                                    <th>Region Name</th><td>{{ $user->branch->zone->region->name }}</td>
                                </tr>
                            @else
                                <tr class="bg-danger">
                                    <th>Region Name</th><td>Deleted</td>
                                </tr>
                            @endif
                            @if(isset($user->branch->zone->id))
                                <tr>
                                    <th>Zone Name</th><td>{{ $user->branch->zone->name }}</td>
                                </tr>
                            @else
                                <tr class="bg-danger">
                                    <th>Zone Name</th><td>Deleted</td>
                                </tr>
                            @endif
                            @if(isset($user->branch->id))
                                <tr>
                                    <th>Branch Name</th><td>{{ $user->branch->name }}</td>
                                </tr>
                            @else
                                <tr class="bg-danger">
                                    <th>Branch Name</th><td>Deleted</td>
                                </tr>
                            @endif
                            <tr>
                                <th>Created Date</th><td>{{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
