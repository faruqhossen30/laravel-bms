<nav class="navbar navbar-expand-md navbar-light">
   <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa fa-bars"></i>
      </button>
      <div class="logo">
         <a href="{{ route('index') }}"><img src="{{ asset('static/images/logo.png') }}" alt="Logo"></a>
      </div>
      <div class="dateshow">
         <span class=""></span>
         <span> {{ date('d-M-Y') }} <br>
         <span id="clock"></span>
      </div>
      <div class="collapse navbar-collapse" id="navbar">
         @guest
         <ul class="navbar-nav ml-auto d-flex flex-row justify-content-center">
            <a class="nav-link" href="#" type="button" data-toggle="modal" data-target="#exampleModal">
               <li class="nav-item btn btn-outline-warning ml-1">
                  Registration
               </li>
            </a>
            <a class="nav-link" href="#" type="button" data-toggle="modal" data-target="#signinm">
               <li class="nav-item btn btn-outline-warning ml-1">
                  Sign In
               </li>
            </a>
         </ul>
         @else
         @if(Auth::user()->is_club == '1')
         <ul class="navbar-nav ml-auto">
            <li class="nav-item d-md-none">
               <a class="nav-link" href="{{ route('club.profile') }}"> {{ Auth::user()->name }} <span class="text-warning"> ({{ $bs->currency_symbol }} {{ number_format(Auth::user()->balance, 2) }}) </span></a>
            </li>
            <li class="nav-item d-md-none">
               <a class="nav-link" href="{{ route('club.profile') }}"> My Wallet </a>
            </li>
            <li class="nav-item d-md-none">
               <a class="nav-link" href="{{ route('club.statement') }}"> My Statement </a>
            </li>
            <li class="nav-item d-md-none">
               <a class="nav-link" href="#" data-toggle="modal" data-target="#ReferralsModal"> My Referrals </a>
            </li>
            <li class="nav-item d-md-none">
               <a class="nav-link" href="#" data-toggle="modal" data-target="#complainModal"> Complain Box </a>
            </li>
            <li class="nav-item dropdown d-none d-md-block">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               {{ Auth::user()->name }} <span class="text-warning"> ({{ $bs->currency_symbol }} {{ number_format(Auth::user()->balance, 2) }}) </span>
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('club.profile') }}">My Wallet</a>
                  <a class="dropdown-item" href="{{ route('club.statement') }}">My Statement</a>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ReferralsModal">My Referrals</a>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#complainModal">Complain Box</a>
               </div>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{ route('user.alart') }}"> Alart <span class="badge badge-dark alart-count"></span> </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
               {{ __('Logout') }}
               </a>
            </li>
         </ul>
         @elseif(Auth::user()->is_admin == '1')
         <ul class="navbar-nav ml-auto">
            <a class="nav-link" href="{{ route('admin.dashboard') }}" type="button">
               <li class="nav-item btn btn-outline-warning ml-1">
                  Admin Panel
               </li>
            </a>
         </ul>
         @else
         <ul class="navbar-nav ml-auto">
            <li class="nav-item d-md-none">
               <a class="nav-link" href="{{ route('home') }}"> {{ Auth::user()->name }} <span class="text-warning"> ({{ $bs->currency_symbol }} {{ number_format(Auth::user()->balance, 2) }}) </span></a>
            </li>
            <li class="nav-item d-md-none">
               <a class="nav-link" href="{{ route('home') }}"> My Wallet </a>
            </li>
            <li class="nav-item d-md-none">
               <a class="nav-link" href="{{ route('user.statement') }}"> My Statement </a>
            </li>
            <li class="nav-item d-md-none">
               <a class="nav-link" href="#" data-toggle="modal" data-target="#depositModal"> Deposit </a>
            </li>
            <li class="nav-item d-md-none">
               <a class="nav-link" href="#" data-toggle="modal" data-target="#sponsorModal"> My Sponsor </a>
            </li>
            <li class="nav-item d-md-none">
               <a class="nav-link" href="#" data-toggle="modal" data-target="#complainModal"> Complain Box </a>
            </li>
            <li class="nav-item dropdown d-none d-md-block">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               {{ Auth::user()->name }} <span class="text-warning"> ({{ $bs->currency_symbol }} {{ number_format(Auth::user()->balance, 2) }}) </span>
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('home') }}">My Wallet</a>
                  <a class="dropdown-item" href="{{ route('user.statement') }}">My Statement</a>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#depositModal">Deposit</a>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#sponsorModal">My Sponsor</a>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#complainModal">Complain Box</a>
               </div>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{ route('user.alart') }}"> Alart <span class="badge badge-dark alart-count"></span> </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
               {{ __('Logout') }}
               </a>
            </li>
         </ul>
         @endif
         @endguest
      </div>
   </div>
   <div class="heder_marque for_mob mt-2">
      <marquee class="mrq" scrollamount="4" direction="scroll">
         <p class="scrool-msg">
            {!! $bs->notice !!}
         </p>
      </marquee>
   </div>
</nav>


<section id="sign_buttons for_pc">
   <div class="container">
      <div class="heder_marque">
         <marquee class="mrq" scrollamount="4" direction="scroll">
            <p class="scrool-msg">{!! $bs->notice !!}
            </p>
         </marquee>
      </div>
   </div>
</section>
