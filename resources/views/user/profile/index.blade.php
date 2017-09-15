@extends('user.layouts.app')

@section('content')
    <br/>
    <div class="col-md-12">
        <div  class="panel panel-default">
            <div class="panel-heading">My Profile
                {{--<span class="pull-right"><a href="{{ url('/profile/edit') }}" title="Edit Profile"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a></span></div>--}}
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <th>Name</th><td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            @if(!empty(Auth::user()->profile->image))
                                <td>{{ HTML::image('uploads/users/' . Auth::user()->profile->image, Auth::user()->name, array('class' => 'img-circle img-responsive')) }}</td>
                            @else
                                <td>{{ HTML::image('design/assets/img/avatars/member.png', Auth::user()->name, array('class' => 'img-circle img-responsive')) }}</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Region Name</th>
                            @if(!empty(Auth::user()->branch->zone->region->id))
                                <td>{{ Auth::user()->branch->zone->region->name }}</td>
                            @else
                                <td class="bg-danger">Deleted</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Zone Name</th>
                            @if(!empty(Auth::user()->branch->zone->id))
                                <td>{{ Auth::user()->branch->zone->name }}</td>
                            @else
                                <td class="bg-danger">Deleted</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Zone Name</th>
                            @if(!empty(Auth::user()->branch->id))
                                <td>{{ Auth::user()->branch->name }}</td>
                            @else
                                <td class="bg-danger">Deleted</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Email</th><td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <th>Mobile No</th><td>{{ Auth::user()->contact }}</td>
                        </tr>
                        <tr>
                            <th>Address</th><td>{{ Auth::user()->address }}</td>
                        </tr>
                        <tr>
                            <th>Designation</th><td>{{ Auth::user()->designation }}</td>
                        </tr>
                        <tr>
                            <th>Department</th><td>{{ Auth::user()->department }}</td>
                        </tr>
                        <tr>
                            <th>About</th><td>{{ Auth::user()->description }}</td>
                        </tr>

                        <tr class="bg-info">
                            <th>Status</th>
                            @if(!empty(Auth::user()->status))
                                <td>{{ Auth::user()->status }}</td>
                            @else
                                <td>Active</td>
                            @endif
                        </tr>
                        <tr class="bg-warning">
                            <th>Created By</th>
                            @if(!empty(Auth::user()->createdBy->id))
                                <td>{{ Auth::user()->createdBy->name }}</td>
                            @else
                                <td class="bg-danger">Deleted</td>
                            @endif
                        </tr>
                        <tr class="bg-primary text-center">
                            <th>Created Date</th>
                            <th>{{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('l j F Y') }}</th>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
