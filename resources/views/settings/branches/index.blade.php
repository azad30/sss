@extends('layouts.app')

@section('content')

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <i class="fa fa-table"></i>
                        Branch
                        <a href="{{ url('/settings/branch/create') }}" class="btn btn-primary btn-sm" title="Add New Branch">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered width-100 cellspace-0">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Branch</th><th>Zone</th><th>Region</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($branch as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        @if(isset($item->zone->id))
                                        <td>
                                            {{ $item->zone->name }}
                                        </td>
                                        @else
                                        <td class="bg-danger">
                                            Deleted
                                        </td>
                                        @endif
                                        @if(isset($item->zone->region->id))
                                            <td>
                                                {{ $item->zone->region->name }}
                                            </td>
                                        @else
                                            <td class="bg-danger">
                                                Deleted
                                            </td>
                                        @endif
                                        <td>
                                            <a href="{{ url('/settings/branch/' . $item->id) }}" title="View Branch"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/settings/branch/' . $item->id . '/edit') }}" title="Edit Branch"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            {!! FORM::open([
                                                'method'=>'DELETE',
                                                'url' => ['/settings/branch', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! FORM::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Branch',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! FORM::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $branch->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
@endsection
