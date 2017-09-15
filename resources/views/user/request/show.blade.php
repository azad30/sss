@extends('user.layouts.app')

@section('content')
    <br/>
    <div class="col-md-10 col-md-offset-1 ">
        <div  class="panel panel-default">
            <div class="panel-heading">Request {{ $request->id }}</div>
            <div class="panel-body">
                <a href="{{ url('/request') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a>
                <a href="{{ url('/request/' . $request->id . '/edit') }}" title="Edit Request"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                {!! FORM::open([
                    'method'=>'DELETE',
                    'url' => ['/request', $request->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! FORM::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete Request',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                {!! FORM::close() !!}
                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            {{--<tr>--}}
                                {{--<th>ID</th><td>{{ $request->id }}</td>--}}
                            {{--</tr>--}}
                            <tr>
                                <th>User Name</th>
                                @if($request->user->id)
                                    <td>{{ $request->user->name }}</td>
                                @else
                                    <td class="bg-danger">Deleted</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Region Name</th>
                                @if($request->user->branch->zone->region->id)
                                    <td>{{ $request->user->branch->zone->region->name }}</td>
                                @else
                                    <td class="bg-danger">Deleted</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Zone Name</th>
                                @if($request->user->branch->zone->id)
                                    <td>{{ $request->user->branch->zone->name }}</td>
                                @else
                                    <td class="bg-danger">Deleted</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Branch Name</th>
                                @if($request->user->branch->id)
                                    <td>{{ $request->user->branch->name }}</td>
                                @else
                                    <td class="bg-danger">Deleted</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Branch Code</th><td>{{ $request->branchcode }}</td>
                            </tr>
                            <tr>
                                <th>Contact Name</th><td>{{ $request->contact_name }}</td>
                            </tr>
                            <tr>
                                <th>Mobile number</th><td>{{ $request->contact_number }}</td>
                            </tr>
                            @if($request->problem_type == 'MIS')

                                <tr>
                                    <th colspan="2" class="bg-warning text-center">Problem</th>
                                </tr>








                                <tr>
                                    <th>Problem Module</th><td>{{ $request->problem_type }}</td>
                                </tr>
                                <tr>
                                    <th>Problem Name</th><td>{{ $request->problem_name }}</td>
                                </tr>
                                <tr>
                                    <th>Problem Member Name</th><td>{{ $request->problem_member_name }}</td>
                                </tr>
                                <tr>
                                    <th>Problem Member ID</th><td>{{ $request->problem_member_id }}</td>
                                </tr>
                                <tr>
                                    <th>Problem Samity Code</th><td>{{ $request->problem_samity_code }}</td>
                                </tr>
                                <tr>
                                    <th>Problem Date</th><td>{{ \Carbon\Carbon::parse($request->problem_date)->format('l j F Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Problem Amount</th><td>{{ $request->problem_amount }}</td>
                                </tr>
                                <tr>
                                    <th>Problem Details</th><td>{{ $request->problem_details }}</td>
                                </tr>
                                <tr>
                                    <th colspan="2" class="bg-success text-center">Solution</th>
                                </tr>
                                <tr>
                                    <th>Right Member Name</th><td>{{ $request->right_member_name }}</td>
                                </tr>
                                <tr>
                                    <th>Right Member ID</th><td>{{ $request->right_member_id }}</td>
                                </tr>
                                <tr>
                                    <th>Right Samity Code</th><td>{{ $request->right_samity_code }}</td>
                                </tr>
                                <tr>
                                    <th>Right Amount</th><td>{{ $request->right_amount }}</td>
                                </tr>
                                <tr>
                                    <th>Right Details</th><td>{{ $request->right_details }}</td>
                                </tr>
                            @elseif($request->problem_type == 'AIS')
                                <tr>
                                    <th colspan="2" class="bg-warning text-center">Problem</th>
                                </tr>
                                <tr>
                                    <th>Problem Module</th><td>{{ $request->problem_type }}</td>
                                </tr>
                                <tr>
                                    <th>Problem Name</th><td>{{ $request->problem_name }}</td>
                                </tr>
                                <tr>
                                    <th>Voucher Date</th><td>{{ \Carbon\Carbon::parse($request->problem_date)->format('l j F Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Voucher Code</th><td>{{ $request->voucher_code }}</td>
                                </tr>
                                <tr>
                                    <th colspan="2" class="bg-success text-center">Solution</th>
                                </tr>
                                <tr>
                                    <th>Solution</th><td>{{ $request->right_details }}</td>
                                </tr>
                            @elseif($request->problem_type == 'Regular-Activities')
                                <tr>
                                    <th colspan="2" class="bg-info text-center">Regular Activities</th>
                                </tr>
                                <tr>
                                    <th>Problem Module</th><td>{{ $request->problem_type }} -> {{ $request->module_type }}</td>
                                </tr>
                                <tr>
                                    <th>Regular Activities Name</th><td>{{ $request->problem_name }}</td>
                                </tr>
                                <tr>
                                    <th>Details</th><td>{{ $request->problem_details }}</td>
                                </tr>
                            @else
                                <tr>
                                    <th colspan="2" class="bg-warning text-center">Problem</th>
                                </tr>
                                <tr>
                                    <th>Problem Module</th><td>{{ $request->problem_type }}</td>
                                </tr>
                                <tr>
                                    <th>Problem Name</th><td>{{ $request->problem_name }}</td>
                                </tr>
                                <tr>
                                    <th>Problem Member Name</th><td>{{ $request->problem_details }}</td>
                                </tr>
                                <tr>
                                    <th colspan="2" class="bg-success text-center">Solution</th>
                                </tr>
                                <tr>
                                    <th>Right Details</th><td>{{ $request->right_details }}</td>
                                </tr>
                            @endif

                            @if(isset($request->status->id))
                                @if($request->status->id == 1)
                                    <tr class="bg-warning">
                                        <th>Status</th>
                                        <td>{{ $request->status->name }}</td>
                                    </tr>
                                @elseif($request->status->id == 2)
                                    <tr class="bg-info">
                                        <th>Status</th>
                                        <td>{{ $request->status->name }}</td>
                                    </tr>
                                @elseif($request->status->id == 3)
                                    <tr class="bg-danger">
                                        <th>Status</th>
                                        <td>{{ $request->status->name }}</td>
                                    </tr>
                                @elseif($request->status->id == 4)
                                    <<tr class="bg-success">
                                        <th>Status</th>
                                        <td>{{ $request->status->name }}</td>
                                    </tr>
                                @else
                                    <tr class="text-center">
                                        <th>Status</th>
                                        <td class="bg-warning">{{ $request->status->name }}</td>
                                    </tr>
                                @endif
                            @else
                                <th class="bg-danger">Deleted</th>
                            @endif

                            <tr class="bg-primary text-center">
                                <th>Created Date</th>
                                <th>{{ \Carbon\Carbon::parse($request->created_at)->format('l j F Y') }}</th>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
