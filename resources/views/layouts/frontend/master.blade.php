<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('static/images/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('static/images/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('static/images/favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('static/images/favicon_io/site.webmanifest') }}">
    <title>@yield('title', '2WinBD')</title>
    <link rel="stylesheet" href="{{ asset('static/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/style.css?v=') . time() }}">
    <link rel="stylesheet" href="{{ asset('static/css/media.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .gradient-backgound {
            background: linear-gradient(to bottom, #009b9b, #009b9b, #008989, #007777, #006666) !important;
            z-index: 99;
        }
    </style>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="100">
    @include('layouts.frontend.header')
    @yield('content')
    @include('layouts.frontend.footer')
    @include('modal.login')
    @include('modal.registration')
    @include('modal.bet')
    @include('modal.sponsor')
    @include('modal.referrals')
    @include('modal.deposit')
    @include('modal.complain')
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <script src="{{ asset('static/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('static/js/slick.min.js') }}"></script>
    <script src="{{ asset('static/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('static/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('static/js/toastr.min.js') }}"></script>
    <script src="{{ asset('static/js/custom.js') }}"></script>

    {!! Toastr::message() !!}
    <script>
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>
    @stack('script')
    <script>
        $(document).ready(function() {
            function showTime() {
                // to get current time/ date.
                var date = new Date();
                // to get the current hour
                var h = date.getHours();
                // to get the current minutes
                var m = date.getMinutes();
                //to get the current second
                var s = date.getSeconds();
                // AM, PM setting
                var session = "AM";

                //conditions for times behavior
                if (h == 0) {
                    h = 12;
                }
                if (h >= 12) {
                    session = "PM";
                }

                if (h > 12) {
                    h = h - 12;
                }
                m = (m < 10) ? m = "0" + m : m;
                s = (s < 10) ? s = "0" + s : s;

                //putting time in one variable
                var time = h + ":" + m + ":" + s + " " + session;
                //putting time in our div
                $('#clock').html(time);
                //to change time in every seconds
                setTimeout(showTime, 1000);
            }
            showTime();
        });
    </script>
</body>

</html>
