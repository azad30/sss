<!DOCTYPE html>
<html lang="en">
<head>
    <title>Support System - Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{!! HTML::style('design/assets/vendors/font-awesome/css/font-awesome.min.css') !!}
{!! HTML::style('design/assets/vendors/bootstrap/css/bootstrap.min.css') !!}

<!-- RTL version css -->
    <!-- <link rel="stylesheet" href="../assets/css/yep-rtl.css"> -->

{{--STYLE START--}}
@yield('style')
{{--STYLE END--}}

<!-- Yeptemplate css --><!-- Please use *.min.css in production --><!-- Please use *.min.css in production -->
{!! HTML::style('design/assets/css/yep-style.css') !!}
{!! HTML::style('design/assets/css/yep-vendors.css') !!}

<!-- favicon -->
    <link rel="shortcut icon" href="{{ url('design/assets/img/favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ url('design/assets/img/favicon/favicon.ico') }}" type="image/x-icon">
</head>

<body id="mainbody" >
<div id="container" class="container-fluid skin-3" >

{{--HEADER START--}}
@include('user.common.header')
{{--HEADER END--}}


<!-- main content  -->
    <div id="main" class="main">
        <div class="row">

            {{--SESSION MESSAGE START--}}
            @include('user.common.session_alert')
            {{--SESSION MESSAGE END--}}

            {{--MAIN CONTENT START--}}
            @yield('content')
            {{--MAIN CONTENT END--}}

        </div><!-- end .row -->
    </div>
    <!-- ./end #main  -->

    {{--FOOTER START--}}
    @include('user.common.footer')
    {{--FOOTER END--}}
</div>
<!-- General JS script library-->
{!! HTML::script('design/assets/vendors/jquery/jquery.min.js') !!}
{!! HTML::script('design/assets/vendors/jquery-ui/js/jquery-ui.min.js') !!}
{!! HTML::script('design/assets/vendors/bootstrap/js/bootstrap.min.js') !!}
{!! HTML::script('design/assets/vendors/jquery-searchable/js/jquery.searchable.min.js') !!}
{!! HTML::script('design/assets/vendors/jquery-fullscreen/js/jquery.fullscreen.min.js') !!}

<!-- Yeptemplate JS Script --><!-- Please use *.min.js in production -->
{!! HTML::script('design/assets/js/yep-script.js') !!}

{{--SCRIPT START--}}
@yield('script')
{{--SCRIPT END--}}

<script>
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").alert('close');
    });
</script>
</body>
</html>
