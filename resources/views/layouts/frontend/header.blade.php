<div class="container-fluid gradient-backgound">
    <!-- <div class="container"> -->
    <nav class="navbar navbar-expand-md navbar-dark gradient-backgound">
        <a href="{{ route('index') }}"><img src="{{ asset('static/images/logo.png') }}" style="height: 50px" alt="Logo"></a>

        @auth
        <div class="d-md-none icon-navbar">
            <ul class="nav nav-fill justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <span>
                            <i class="far fa-calendar-alt"></i>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                       <span>
                        <i class="far fa-calendar-alt"></i>
                       </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span>
                            <i class="far fa-calendar-alt"></i>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span>
                            {{ $bs->currency_symbol }} {{ number_format(Auth::user()->balance, 2) }}
                        </span>
                    </a>
                </li>
            </ul>
        </div>

        @endauth

        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon"></span> -->
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffff" class="bi bi-distribute-vertical" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 1.5a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 0-1h-13a.5.5 0 0 0-.5.5zm0 13a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 0-1h-13a.5.5 0 0 0-.5.5z" />
                    <path d="M2 7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7z" />
                </svg>
            </span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
            @if (Auth::user()->is_club == '1')
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"> Test</span></a>
                </li>

            </ul>
            @elseif(Auth::user()->is_admin == '1')
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link btn btn-outline-warning" href="{{ route('admin.dashboard') }}" type="button">
                        Admin Panel
                    </a>
                </li>
            </ul>
            @else
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Wallet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.statement') }}">Statement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#depositModal"> Deposit </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#sponsorModal"> My Sponsor </a>
                </li>
                @if(option('complain_system') == 'on')
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#complainModal"> Complain Box </a>
                 </li>
                @endif
                <li class="nav-item">
                    <button class="nav-item btn btn-outline-warning ml-1">
                        {{ Auth::user()->name }} <span class="text-warning"> ({{ $bs->currency_symbol }} {{ number_format(Auth::user()->balance, 2) }}) </span>
                    </button>
                </li>
                <li class="nav-item">
                    <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                    <button class="nav-item btn btn-outline-warning ml-1">
                        Logout
                    </button>
                    </a>
                 </li>
            </ul>
            @endif
            @endauth

            @guest
            <ul class="navbar-nav ml-auto">
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
            @endguest
        </div>
    </nav>
    <!-- </div> -->
</div>



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
