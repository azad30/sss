@extends('user.layouts.app')
@section('style')
    {!! HTML::style('design/assets/vendors/bootstrap-markdown/css/bootstrap-markdown.min.css') !!}
    <style>
    fieldset
    {
    border: 1px solid #ddd !important;
    margin: 0;
    xmin-width: 0;
    padding: 10px;
    position: relative;
    border-radius:4px;
    background-color:#f5f5f5;
    padding-left:10px!important;
    }

    legend
    {
    font-size:14px;
    font-weight:bold;
    margin-bottom: 0px;
    width: 35%;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px 5px 5px 10px;
    background-color: #ffffff;
    }
    </style>
@endsection
@section('content')
    <br/>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ url('/') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a> - Create New Request</div>
                <div class="panel-body">
                    <br />
                    <br />
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    {!! FORM::open(['url' => '/request', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('user.request.form')

                    {!! FORM::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!! HTML::script('design/assets/vendors/bootstrap-markdown/js/markdown.min.js') !!}
    {!! HTML::script('design/assets/vendors/bootstrap-markdown/js/to-markdown.min.js') !!}
    {!! HTML::script('design/assets/vendors/bootstrap-markdown/js/bootstrap-markdown.min.js') !!}
    <script>
        // Markdown editor Script
        $("#mis_regular_activity_details").markdown({autofocus:false,savable:false});
        $("#ais_regular_activity_details").markdown({autofocus:false,savable:false});
        $("#others_right_details").markdown({autofocus:false,savable:false});
        $("#others_problem_details").markdown({autofocus:false,savable:false});

        $(function() {
        $("[name=problem]").click(function(){
        $('.toHide').hide();
        $("#blk-"+$(this).val()).fadeIn(1000);
        });

        });
    </script>
@endsection