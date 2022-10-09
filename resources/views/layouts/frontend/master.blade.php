<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Net T20')</title>
    <link rel="stylesheet" href="{{asset('static/tailwindcss/output.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css"
        integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('static/css/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .accordion-button:after {
            background-image: none
        }
    </style>
</head>

<body class="bg-emerald-900 h-screen">
    @include('layouts.frontend.header')
    @include('modal.modal')
    @include('modal.sign-up')
    @include('modal.bet-now')

    <!-- Main Section start -->
    @yield('content')
    <!-- Main Section end -->

    @include('layouts.frontend.footer')
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('static/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('static/js/toastr.min.js') }}"></script>
    <script src="{{ asset('static/js/customjs-new.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>

</html>
