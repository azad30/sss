@extends('layouts.app')
@section('content')
    <div class="col-md-12 ">
        <div  class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="fa fa-table"></i>
                    User
                    <a href="{{ url('/settings/user/create') }}" class="btn btn-primary btn-sm" title="Add New User">
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
                        <th>User Name</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td class="bg-info">{{ $item->role }}</td>
                            @if($item->status == '')
                                <td class="bg-success">Active</td>
                            @else
                                <td>{{ $item->status }}</td>
                            @endif
                            <td>
                                @if (Auth::user()->role == 'admin')
                                    @if($item->role == 'user')
                                        {{--@if($item->role == 'user' || $item->role == 'admin')--}}

                                        {{--<a href="#" title="Deactive User">--}}
                                            {{--<button class="btn btn-danger btn-xs">--}}
                                                {{--<i class="fa fa-user-times" aria-hidden="true"></i></button></a>--}}
                                          @if($item->status=='Active')
                                            <a href="{{ url('/settings/user/user_active_deactive/'. $item->id) }}" title="Deactivate User"> <button class="btn btn-danger btn-xs">Deactive</button></a>
                                           {{--<a href="{{ url('/settings/user/deactivate/'. $item->id) }}" title="Deactivate User"> <button class="btn btn-danger btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>--}}
                                        @else
                                            <a href="{{ url('/settings/user/active_deactive/'. $item->id) }}" title="Active User"> <button class="btn btn-success btn-xs">Active</button></a>
                                            {{--<a href="{{ url('/settings/user/activate/'. $item->id) }}" title="Active User"> <button class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>--}}
                                        @endif

                                        <a href="{{ url('/settings/user/' . $item->id) }}" title="View User"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/settings/user/' . $item->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>


                                        {!! FORM::open([
                                        'method'=>'DELETE',
                                        'url' => ['/settings/user', $item->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! FORM::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'title' => 'Delete User',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                        {!! FORM::close() !!}
                                    @elseif($item->role == 'admin')
                                        <a href="{{ url('/settings/user/' . $item->id) }}" title="View User"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                    @else
                                        <a href="{{ url('/settings/user/' . $item->id) }}" title="View User"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                    @endif
                                @else
                                    @if($item->role == 'user' || $item->role == 'admin')
                                        <a href="{{ url('/settings/user/' . $item->id) }}" title="View User"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/settings/user/' . $item->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                        {!! FORM::open([
                                        'method'=>'DELETE',
                                        'url' => ['/settings/user', $item->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! FORM::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'title' => 'Delete User',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                        {!! FORM::close() !!}
                                    @elseif($item->role == 'superadmin')
                                        <a href="{{ url('/settings/user/' . $item->id) }}" title="View User"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/settings/user/' . $item->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                    @else
                                        {{--echo "super admin missing";--}}
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $user->render() !!} </div>
            </div>
        </div><!-- end panel -->
    </div><!-- end .col-md-12 -->
@endsection
