@extends('layouts.app')

@section('content')
    <div class="col-md-12 ">
        <div  class="panel panel-default">
            <div class="panel-heading">
                <a class="btn btn-warning btn-xs" href="{{ url('/settings/user') }}" title="Back" class=""><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                - Create New User
            </div>
            <div class="panel-body">
                @if ($errors->any())
                    <div class="alert alert-danger" align="center" id="error-alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <ul style="list-style-type: none;">
                            @foreach ($errors->all() as $error)
                                <li >{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! FORM::open(['url' => '/settings/user', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true]) !!}

                    @include ('settings.user.form',  ['disable' => false])

                {!! FORM::close() !!}

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("[name=region_id]").change(function() {
                var region = $('[name=region_id]').val();
                var baseUrl = '{{ url('/') }}';
                $.ajax({
                    type: 'POST',
                    url: baseUrl + '/ajax/show-zone',
                    data: {region_id: region},
                    success: function (result) {
                        $('[name=zone_id]').html(result);
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus);
                        alert("Error: " + errorThrown);
                    }
                });
            });
            $("[name=zone_id]").change(function() {
                var zone = $('[name=zone_id]').val();
                var baseUrl = '{{ url('/') }}';
                $.ajax({
                    type: 'POST',
                    url: baseUrl + '/ajax/show-branch',
                    data: {zone_id: zone},
                    success: function (result) {
                        $('[name=branch_id]').html(result);
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus);
                        alert("Error: " + errorThrown);
                    }
                });
            });
        });
    </script>
@endsection
