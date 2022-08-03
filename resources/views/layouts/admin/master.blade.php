<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="csrf-token" content="{!! csrf_token() !!}" />
      <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('static/images/favicon_io/apple-touch-icon.png') }}">
      <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('static/images/favicon_io/favicon-32x32.png') }}">
      <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('static/images/favicon_io/favicon-16x16.png') }}">
      <link rel="manifest" href="{{ asset('static/images/favicon_io/site.webmanifest') }}">
      <title>@yield('title', 'Administer | 2WinBD')</title>
      @stack('styles')
      <link href="{{ asset('static/administer/vendor/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
      <link href="{{ asset('static/administer/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
      <link href="{{ asset('static/administer/vendor/summernote/summernote.min.css') }}" rel="stylesheet" type="text/css">
      <link href="{{ asset('static/administer/vendor/sweetalert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
      <link href="{{ asset('static/administer/css/style.css') }}" rel="stylesheet" type="text/css">


   </head>
   <body id="page-top">
      <div id="wrapper">
         @include('layouts.admin.sidebar')
         <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
               @include('layouts.admin.topbar')
               <div class="container-fluid" id="container-wrapper">
                  @include('layouts.admin.breadcrumb')
                  @include('layouts.flash')
                  @yield('content')
                  @include('layouts.admin.modal')
               </div>
            </div>
            <footer class="sticky-footer bg-white">
               <div class="container my-auto">
                  <div class="copyright text-center my-auto"><span>Copyright &copy; 2021 </span></div>
               </div>
            </footer>
         </div>
      </div>
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      <script src="{{ asset('static/administer/vendor/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('static/administer/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('static/administer/vendor/sweetalert/sweetalert2.min.js') }}"></script>
      <script src="{{ asset('static/administer/js/custom.js') }}"></script>
      @stack('scripts')
   </body>
</html>
