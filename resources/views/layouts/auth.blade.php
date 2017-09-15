<!DOCTYPE html>
<html>
<head>
    <title>Support System - Login</title>
    <meta charset="utf-8">

    {{--CSRF TOKEN --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! HTML::style('design/assets/vendors/bootstrap/css/bootstrap.min.css') !!}
    {!! HTML::style('design/assets/vendors/font-awesome/css/font-awesome.min.css') !!}
    <!-- <link rel="stylesheet" href="../assets/css/yep-rtl.css"> -->

    <!-- Related css to this page -->
    {!! HTML::style('design/assets/vendors/animate/css/animate.min.css') !!}

    <!-- Yeptemplate css --><!-- Please use *.min.css in production -->
    {!! HTML::style('design/assets/css/yep-style.css') !!}
    {!! HTML::style('design/assets/css/yep-vendors.css') !!}

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('design/assets/img/favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('design/assets/img/favicon/favicon.ico') }}" type="image/x-icon">

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<!-- You can use .rtl CSS in #login-page -->
<body id="login-page" >
    <canvas id="spiders" class="hidden-xs" ></canvas>
    <div class="">
    <div style="margin: 5% auto; position: relative; width: 400px;">
    {{--HEADER START--}}
    @yield('content')
    {{--HEADER END--}}

    {{--FOOTER START--}}

    <div class="panel panel-default">
        <div class="panel-body text-center">
            <p>Copyright 2017 <a href="http://juvenilepacersbd.com/" target="_blank">JuvenilePacers</a> All right reserved.</p>
        </div>
    </div>

    {{--FOOTER END--}}

    </div>

    </div>


    <!-- General JS script library-->
    {!! HTML::script('design/assets/vendors/jquery/jquery.min.js') !!}

    {!! HTML::script('design/assets/vendors/jquery-ui/js/jquery-ui.min.js') !!}

    {!! HTML::script('design/assets/vendors/bootstrap/js/bootstrap.min.js') !!}
    {!! HTML::script('design/assets/vendors/jquery-searchable/js/jquery.searchable.min.js') !!}
    {!! HTML::script('design/assets/vendors/jquery-fullscreen/js/jquery.fullscreen.min.js') !!}

    <!-- Yeptemplate JS Script --><!-- Please use *.min.js in production -->
    {!! HTML::script('design/assets/js/yep-script.js') !!}

    <!-- Related JavaScript Library to This Pagee -->

<!-- Google Analytics Script -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-67070957-1', 'auto');
    ga('send', 'pageview');
</script>

</body>
</html>