<section class="p-2">
    <div class="text-white border">
        <div class="bg-yellow-400">
            <h4 class="text-emerald-800 font-bold p-1">Nocice</h4>
        </div>
        <p class="p-2">{{ $bs->footer_notice }}</p>
    </div>
</section>
<footer class="block w-full md:hidden sticky bottom-0 bg-white text-emerald-700 text-sm">
    <div class="flex justify-around py-1">
        <div class="">
            <a href="" class="flex flex-col text-center">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
        </div>
        <div class="">
            <a
            @if (Auth::check())
                @if (Auth::user()->is_club == '1')
                href="{{ route('club.profile') }}"
                @else
                href="{{ route('home') }}"
                @endif
            @else
            data-bs-toggle="modal" data-bs-target="#loginModal"
            @endif
                class="flex flex-col text-center">
                <i class="fas fa-wallet"></i>
                <span>Wallet</span>
            </a>
        </div>
        <div class="">
            <a class="flex flex-col text-center"
                @if (Auth::check()) data-bs-toggle="modal" data-bs-target="#depositeModal"
            @else
            data-bs-toggle="modal" data-bs-target="#loginModal" @endif>
                <span class="">
                    <i class="far fa-money-bill-alt"></i>
                </span>
                <span>Deposite</span>
            </a>
        </div>
        <div class="">
            <a @if (Auth::check()) @if (Auth::user()->is_club == '1')
                href="{{ route('club.statement') }}"
                @else
                href="{{ route('user.statement') }}" @endif
            @else data-bs-toggle="modal" data-bs-target="#loginModal" @endif
                class="flex flex-col text-center">
                <i class="fas fa-th-list"></i>
                <span>Statement</span>
            </a>
        </div>
        <div class="">
            <a href="#" class="flex flex-col text-center dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle"></i>
                <span>Account</span>
            </a>
            <ul class=" dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none "
                aria-labelledby="dropdownMenuButton1">
                @auth
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"
                            class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">Logout
                        </a>
                    </li>
                @endauth
                @guest
                    <li>
                        <a data-bs-toggle="modal" data-bs-target="#loginModal"
                            class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">Login
                        </a>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</footer>
