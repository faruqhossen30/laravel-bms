<header class="sticky top-0 z-50">
    <div class="flex h-14 px-2 bg-emerald-800 border-b-2 border-emerald-600 ">
        <a href="#" class="flex items-center mr-4">
            <img src="{{ asset('static') }}/img/logo.png" class="h-8" alt="">
        </a>
        <div class="flex sm:justify-end md:justify-between flex-grow items-center">
            @auth
            @if (Auth::user()->is_club == '1')
            <div class="hidden md:block text-white text-sm font-bold space-x-3">
                <a class="nav-link" href="{{ route('club.profile') }}"> {{ Auth::user()->name }} <span class="text-warning"> ({{ $bs->currency_symbol }} {{ number_format(Auth::user()->balance, 2) }}) </span></a>
                <a class="nav-link" href="{{ route('club.profile') }}"> My Wallet </a>
                <a class="nav-link" href="{{ route('club.statement') }}"> My Statement </a>
                <a class="nav-link" href="#" data-toggle="modal" data-target="#ReferralsModal"> My Referrals </a>
                <a class="nav-link" href="#" data-toggle="modal" data-target="#complainModal"> Complain Box </a>
                <a class="nav-link" href="{{ route('user.alart') }}"> Alart <span class="badge badge-dark alart-count"></span> </a>
            </div>
            @else
            <div class="hidden md:block text-white text-sm font-bold space-x-3">
                <a href="#">Wallet </a>
                <a href="#">Statement </a>
                <a href="#">Deposite </a>
                <a href="#">My Sponser </a>
                <a href="{{ route('user.alart') }}"> Alart <span class="badge badge-dark alart-count"></span> </a>
            </div>
            @endif

            @endauth
            @guest
            <div class="hidden md:block text-white text-sm font-bold space-x-3">
            </div>
            @endguest
            <div class="space-x-2">
                @auth
                <span class="font-bold text-white">
                    {{ $bs->currency_symbol }} {{ number_format(Auth::user()->balance, 2) }}
                </span>
                <button type="button"
                class="inline-block px-6 py-2.5 bg-white text-emerald-800 font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg transition duration-150 ease-in-out"
                data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>

                @if (Auth::user()->is_admin == '1')
                <a href="{{ route('admin.dashboard') }}"  type="button"
                class="inline-block px-6 py-2.5 bg-white text-emerald-800 font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg transition duration-150 ease-in-out"
                data-bs-toggle="modal" data-bs-target="#loginModal">Admin Panel</a>
                @endif

                @endauth
                @guest
                    <button type="button"
                        class="inline-block px-6 py-2.5 bg-white text-emerald-800 font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg transition duration-150 ease-in-out"
                        data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                    <button type="button"
                        class="inline-block px-6 py-2.5 bg-white text-emerald-800 font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg transition duration-150 ease-in-out"
                        data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                @endguest
            </div>
        </div>
    </div>
</header>
