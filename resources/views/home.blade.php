@extends('layouts.app')
@section('style')
    <!-- Related css to this page -->
    {!! HTML::style('design/assets/vendors/morrisjs/css/morris.css') !!}
    {!! HTML::style('design/assets/vendors/bootstrap-daterangepicker/css/daterangepicker.min.css') !!}
    {!! HTML::style('design/assets/vendors/fullcalendar/css/fullcalendar.min.css') !!}
    {!! HTML::style('design/assets/vendors/fullcalendar/css/fullcalendar.print.min.css', array('media' => 'print')) !!}

@endsection
@section('content')

    <!-- main content -->
    <div id="content">
        <div id="sortable-panel" class="">

            <div id="titr-content" class="col-md-12">
                <h2>Dashboard</h2>
                {{--<h5>Support system admin template</h5>--}}

            </div>

            <!-- Admin over view .col-md-12 -->
            <div class="col-md-12 ">
                <div  class="panel panel-default">
                    <div class="panel-body">

                        <i class="glyphicon glyphicon-stats"></i>
                        <b>Problem Presentence</b>
                        <div class="bars pull-right">
                            {{--<div id="reportrange" class="pull-right daterange hidden-xs" >
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                <span></span> <b class="caret"></b>
                            </div>--}}
                        </div>
                        <hr>
                        <div class="row">
                            <!-- progress section -->
                            <div class="col-sm-3">
                                <?php $total_count = App\ProblemRequest::all()->count(); ?>


                                    @foreach($requests_count_by_regions as $reqCnt)

                                <div  class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="headprogress">
                                            <strong>{{$reqCnt->name}}</strong>
                                            <strong class="progress-value">{{number_format($reqCnt->cnt/$total_count * 100, 2)}}%</strong>
                                        </div>
                                        <div class="progress  progress-xs">
                                            <div class="progress-bar progress-bar-info" role="progressbar" style="width: 15%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                    {{--return 0;--}}
                            </div>
                            <!-- ./preogress section -->
                            <!-- chart section -->
                            <div class="col-sm-9">
                                <div  class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <i class="fa fa-bar-chart-o"></i>
                                            Chart
                                            <div class="bars pull-right">
                                                <a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Maximize"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">

                                        <div id="barChart-1" class="chart-placeholder"></div>

                                    </div>

                                </div><!-- end panel -->
                            </div>
                            <!-- ./chart section -->

                        </div>
                    </div>

                </div><!-- end panel -->
            </div>
            <!-- /end Admin over view .col-md-12 -->
        </div><!-- end col-md-12 -->
    </div><!-- end #content -->



@endsection

@section('script')
    <!-- Related JavaScript Library to This Pagee -->
    {!! HTML::script('design/assets/vendors/morrisjs/js/raphael.min.js') !!}
    {!! HTML::script('design/assets/vendors/morrisjs/js/morris.min.js') !!}
    {!! HTML::script('design/assets/vendors/select2/js/select2.js') !!}
    {!! HTML::script('design/assets/vendors/select2/js/select2.min.js') !!}
    {!! HTML::script('design/assets/vendors/momentjs/js/moment.min.js') !!}
    {!! HTML::script('design/assets/vendors/bootstrap-daterangepicker/js/daterangepicker.min.js') !!}
    {!! HTML::script('design/assets/vendors/jquery-ui/js/jquery-ui.custom.min.js') !!}
    {!! HTML::script('design/assets/vendors/fullcalendar/js/fullcalendar.min.js') !!}

    <!-- Plugins Script -->
    <script type="text/javascript">
        $(function(){

            // daterange picker
            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            cb(moment().subtract(29, 'days'), moment());

            $('#reportrange').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);


            /* Bar Chart Style-1 */
            Morris.Bar({
                element: 'barChart-1',
                data: <?= $dta?>,
                xkey: 'name',
                ykeys: ['cnt'],
                labels: ['Total'],
                barColors: function (row, series, type) {
                    if (type === 'bar') {
                        var red = Math.ceil(255 * row.y / this.ymax);
                        return 'rgb(' + red + ',0,0)';
                    }
                    else {
                        return '#000';
                    }
                }
            });
        });

    </script>
@endsection