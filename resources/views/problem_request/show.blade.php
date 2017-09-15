@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div  class="panel panel-default">
            <div class="panel-heading"><a href="{{ url('/problem_request') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a> - Problem Request {{ $request->id }}</div>
            <div class="panel-body">

                <div id="printable-area">
                    <div class="table-responsive">
                        <table class="table table-borderless" style="margin-bottom: 10px">
                            <h4>User Information:</h4>
                                <h4>Problem file</h4>
                            <a class="btn btn-info" href="{{ url('uploads').'/'.$request->documentt }}">Download Now</a>
                            <thead>
                                <tr>
                                    <th style="width: 40%;">User Name</th>
                                    @if($request->user->id)
                                        <th>{{ $request->user->name }}</th>
                                    @else
                                        <th class="bg-danger">Deleted</th>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Region Name</th>
                                    @if($request->user->branch->zone->region->id)
                                        <th>{{ $request->user->branch->zone->region->name }}</th>
                                    @else
                                        <th class="bg-danger">Deleted</th>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Zone Name</th>
                                    @if($request->user->branch->zone->id)
                                        <th>{{ $request->user->branch->zone->name }}</th>
                                    @else
                                        <th class="bg-danger">Deleted</th>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Branch Name</th>
                                    @if($request->user->branch->id)
                                        <th>{{ $request->user->branch->name }}</th>
                                    @else
                                        <th class="bg-danger">Deleted</th>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Branch Code</th><th>{{ $request->branchcode }}</th>
                                </tr>
                                <tr>
                                    <th>Contact Name</th><th>{{ $request->contact_name }}</th>
                                </tr>
                                <tr>
                                    <th>Contact Number</th><th>{{ $request->contact_number }}</th>
                                </tr>
                            </thead>
                        </table>
                    {{--</div>--}}
                    {{--<div class="table-responsive">--}}
                        <table class="table table-borderless" style="margin-bottom: 10px">
                            <h4>Problem:</h4>
                            <thead>
                                @if($request->problem_type == 'MIS')
                                    <tr>
                                        <th>Problem Module</th><th>{{ $request->problem_type }}</th>
                                    </tr>
                                    <tr>
                                        <th>Problem Name</th><th>{{ $request->problem_name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Problem Member Name</th><th>{{ $request->problem_member_name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Problem Member ID</th><th>{{ $request->problem_member_id }}</th>
                                    </tr>
                                    <tr>
                                        <th>Problem Samity Code</th><th>{{ $request->problem_samity_code }}</th>
                                    </tr>
                                    <tr>
                                        <th>Problem Date</th><th>{{ \Carbon\Carbon::parse($request->problem_date)->format('l j F Y') }}</th>
                                    </tr>
                                    <tr>
                                        <th>Problem Amount</th><th>{{ $request->problem_amount }}</th>
                                    </tr>
                                    <tr>
                                        <th style="width: 40%;">Problem Details</th><th>{{ $request->problem_details }}</th>
                                    </tr>
                            </thead>
                        </table>
                    {{--</div>--}}
                    {{--<div class="table-responsive">--}}
                        <table class="table table-borderless" style="margin-bottom: 10px">
                            <h4>Solution:</h4>
                                    <tr>
                                        <th>Right Member Name</th><th>{{ $request->right_member_name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Right Member ID</th><th>{{ $request->right_member_id }}</th>
                                    </tr>
                                    <tr>
                                        <th>Right Samity Code</th><th>{{ $request->right_samity_code }}</th>
                                    </tr>
                                    <tr>
                                        <th>Right Amount</th><th>{{ $request->right_amount }}</th>
                                    </tr>
                                    <tr>
                                        <th style="width: 40%;">Right Details</th><th>{{ $request->right_details }}</th>
                                    </tr>
                                @elseif($request->problem_type == 'AIS')
                                    <tr>
                                        <th>Problem Module</th><th>{{ $request->problem_type }}</th>
                                    </tr>
                                    <tr>
                                        <th>Problem Name</th><th>{{ $request->problem_name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Voucher Date</th><th>{{ \Carbon\Carbon::parse($request->problem_date)->format('l j F Y') }}</th>
                                    </tr>
                                    <tr>
                                        <th>Voucher Code</th><th>{{ $request->voucher_code }}</th>
                                    </tr>
                                    <tr>
                                        <th>Solution</th><th>{{ $request->right_details }}</th>
                                    </tr>
                                @elseif($request->problem_type == 'Regular-Activities')
                                    <tr>
                                        <th>Problem Module</th><th>{{ $request->problem_type }} -> {{ $request->module_type }}</th>
                                    </tr>
                                    <tr>
                                        <th>Regular Activities Name</th><th>{{ $request->problem_name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Details</th><th>{{ $request->problem_details }}</th>
                                    </tr>
                                @else
                                    <tr>
                                        <th>Problem Module</th><th>{{ $request->problem_type }}</th>
                                    </tr>
                                    <tr>
                                        <th>Problem Name</th><th>{{ $request->problem_name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Problem Member Name</th><th>{{ $request->problem_details }}</th>
                                    </tr>
                                    <tr>
                                        <th style="width: 40%;">Right Details</th><th>{{ $request->right_details }}</th>
                                    </tr>
                                @endif

                                @if(isset($request->status->id))
                                    @if($request->status->id == 1)
                                        <tr class="bg-warning" id="show-status">
                                            <th>Status</th>
                                            <th>{{ $request->status->name }}</th>
                                        </tr>
                                    @elseif($request->status->id == 2)
                                        <tr class="bg-info" id="show-status">
                                            <th>Status</th>
                                            <th>{{ $request->status->name }}</th>
                                        </tr>
                                    @elseif($request->status->id == 3)
                                        <tr class="bg-danger" id="show-status">
                                            <th>Status</th>
                                            <th>{{ $request->status->name }}</th>
                                        </tr>
                                    @elseif($request->status->id == 4)
                                        <tr class="bg-success" id="show-status">
                                            <th>Status</th>
                                            <th>{{ $request->status->name }}</th>
                                        </tr>
                                    @else
                                        <tr class="bg-warning" id="show-status">
                                            <th>Status</th>
                                            <th>{{ $request->status->name }}</th>
                                        </tr>
                                    @endif
                                @else
                                    <th class="bg-danger">Deleted</th>
                                @endif

                                {{--<tr class="bg-primary text-center">--}}
                                    {{--<th>Created Date</th>--}}
                                    {{--<th>{{ \Carbon\Carbon::parse($request->created_at)->format('l j F Y') }}</th>--}}
                                {{--</tr>--}}
                            </thead>
                        </table>
                    </div>
                    <hr/>
                    <div id="ignore-pdf">
                        <form class="form-inline">
                            <div class="form-group">
                                <button type="button" id="create-pdf" onclick="javascript:createPDF();" class="btn btn-primary btn-xs" title="Download PDF"><i class="fa fa-download fa-5x" aria-hidden="true"></i></button>
                            </div>
                            <div class="form-group">
                                <button type="button" id="create-print" onclick="javascript:createPrint();" class="btn btn-info btn-xs" title="Print PDF"><i class="fa fa-print fa-5x" aria-hidden="true"></i></button>
                            </div>
                            <div class="form-group">
                                <button type="button" id="make-success" onclick="javascript:makeSuccess();" class="btn btn-success btn-xs" title="Success"
                                @if(!empty($request->accomplished_by_id))
                                   disabled
                                @endif
                                ><i class="fa fa-check fa-5x" aria-hidden="true"></i></button>
                            </div>
                            <div class="form-group">
                                <button type="button" id="make-cancel" onclick="javascript:makeCancel();" class="btn btn-danger btn-xs" title="Cancel"
                                @if(!empty($request->accomplished_by_id))
                                    disabled
                                @endif
                                ><i class="fa fa-ban fa-5x" aria-hidden="true"></i></button>
                            </div>


                            <div class="pull-right">
                                @if(!empty($request->accomplished->id))
                                    <div class="form-group">
                                        <span class="form-control input-lg">Accomplished By: <a href="{{ url('/settings/user/' . $request->accomplished_by_id) }}" class="bg-link">{{ $request->accomplished->name }}</a></span>
                                    </div>
                                @endif
                                <div class="form-group ">
                                    <span class="form-control input-lg">Seen By: <a href="{{ url('/settings/user/' . $request->seen_by_id) }}" class="bg-link">{{ $request->seen->name }}</a></span>
                                </div>
                                <div class="form-group">
                                    {!! FORM::select('assign-by', Auth::user()->where('role', '=', 'admin')->pluck('name', 'id'), $request->assign_by_id, ['class' => 'form-control input-lg', 'id' => 'assign-by', 'onchange' => 'javascript:assignBy(this.value)', 'placeholder' => 'Assigned by', !empty($request->accomplished_by_id) ? 'disabled' : '']) !!}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {!! HTML::script('design/vendor/notify/notify.min.js') !!}
    {!! HTML::script('design/vendor/jsPDF/dist/jspdf.min.js') !!}
    <script>
    var requestID = '{{ $request->id }}';
    var userId = '{{ Auth::user()->id }}';
    function createPDF() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        // source can be HTML-formatted string, or a reference
        // to an actual DOM element from which the text will be scraped.
        source = $('#printable-area')[0];

        // we support special element handlers. Register them with jQuery-style
        // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
        // There is no support for any other type of selectors
        // (class, of compound) at this time.
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#ignore-pdf': function (element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 60,
            left: 40,
            width: 522
        };
        // all coords and widths are in jsPDF instance's declared units
        // 'inches' in this case
        pdf.fromHTML(
            source, // HTML string or DOM elem ref.
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, // max width of content on PDF
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {
                // dispose: object with X, Y of the last line add to the PDF
                //          this allow the insertion of new lines after html
                pdf.save('request-' + requestID +'.pdf');
            }, margins
        );
    }

    function createPrint() {
        var doc = new jsPDF('p', 'pt', 'letter');
        // source can be HTML-formatted string, or a reference
        // to an actual DOM element from which the text will be scraped.
        source = $('#printable-area')[0];

        // we support special element handlers. Register them with jQuery-style
        // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
        // There is no support for any other type of selectors
        // (class, of compound) at this time.
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#ignore-pdf': function (element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 60,
            left: 40,
            width: 522
        };
        // all coords and widths are in jsPDF instance's declared units
        // 'inches' in this case
        doc.fromHTML(
            source, // HTML string or DOM elem ref.
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, // max width of content on PDF
                'elementHandlers': specialElementHandlers
            },
            function (dispose) {
                // dispose: object with X, Y of the last line add to the PDF
                //          this allow the insertion of new lines after html
                doc.output("dataurlnewwindow");
            }, margins

        );

    }
    function assignBy(v){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var baseUrl = '{{ url('/') }}';
        $.ajax({
            type: 'POST',
            url: baseUrl + '/ajax/assign-by',
            data: {assign_by_id: v, request_id : requestID},
            success: function (result) {
                if(result != 0){
                    $.notify("Request assigned by: " + result, "success");
                }
                else {
                    $.notify("Request assign removed", "warn");
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $.notify("Status: " + textStatus, "error");
                $.notify("Error: " + errorThrown, "error");
            }
        });
    }

    function makeSuccess(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var baseUrl = '{{ url('/') }}';
        $.ajax({
            type: 'POST',
            url: baseUrl + '/ajax/make-success',
            data: {request_id : requestID},
            success: function (result) {
                $('#make-success').attr("disabled","disabled");
                $('#make-cancel').attr("disabled","disabled");
                $('#assign-by').attr("disabled","disabled");
                $('#show-status').attr("class","bg-success");
                $('#show-status').children( "th:nth-child(2)" ).html(result);
                $.notify("Request successfully completed", "success");
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $.notify("Status: " + textStatus, "error");
                $.notify("Error: " + errorThrown, "error");
            }
        });
    }
    function makeCancel(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var baseUrl = '{{ url('/') }}';
        $.ajax({
            type: 'POST',
            url: baseUrl + '/ajax/make-cancel',
            data: {request_id : requestID},
            success: function (result) {
                $('#make-success').attr("disabled","disabled");
                $('#make-cancel').attr("disabled","disabled");
                $('#assign-by').attr("disabled","disabled");
                $('#show-status').attr("class","bg-danger");
                $('#show-status').children( "th:nth-child(2)" ).html(result);
                $.notify("Request successfully canceled", "info");
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $.notify("Status: " + textStatus, "error");
                $.notify("Error: " + errorThrown, "error");
            }
        });
    }

    </script>
@endsection
