@extends('layouts.app')

@section('content')
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Branch {{ $branch->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/settings/branch') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a>
                        <a href="{{ url('/settings/branch/'.$branch->id.'/edit') }}" title="Edit Branch"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                        {!! FORM::open([
                            'method'=>'DELETE',
                            'url' => ['home/settings/branch', $branch->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! FORM::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Branch',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! FORM::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $branch->id }}</td>
                                    </tr>
                                    <tr><th> Branch </th><td> {{ $branch->name }} </td></tr>
                                    <tr>
                                        <th> Zone </th>
                                        @if(isset($branch->zone->id))
                                            <td>
                                                {{ $branch->zone->name }}
                                            </td>
                                        @else
                                            <td class="bg-danger">
                                                Deleted
                                            </td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th> Region </th>
                                        @if(isset($branch->zone->region->id))
                                            <td>
                                                {{ $branch->zone->region->name }}
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
