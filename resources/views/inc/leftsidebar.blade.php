<div class="hidden md:block md:col-span-2 bg-white text-gray-500 text-sm rounded-md">
    <div class="bg-emerald-700">
        <h4 class="text-white font-bold p-1 text-center">Sports</h4>
    </div>
    <div class="flex flex-col space-y-1">
        <a href="{{ route('index') }}"
            class="flex space-x-1 border-b-2 ml-2 last:border-b-0 p-1 hover:bg-green-100 ">
            <img src="{{ asset('static') }}/img/footbal.png" class="h-4" alt="">
            <span>All</span>
        </a>
        <a href="{{ route('sport', 'Cricket') }}"
            class="flex space-x-1 border-b-2 ml-2 last:border-b-0 p-1 hover:bg-green-100">
            <img src="{{ asset('static') }}/img/cricket.png" class="h-4" alt="">
            <span>Cricket</span>
        </a>
        <a href="{{ route('sport', 'FootBall') }}"
            class="flex space-x-1 border-b-2 ml-2 last:border-b-0 p-1 hover:bg-green-100">
            <img src="{{ asset('static') }}/img/footbal.png" class="h-4" alt="">
            <span>Football</span>
        </a>
        <a href="{{ route('sport', 'Basketball') }}"
            class="flex space-x-1 border-b-2 ml-2 last:border-b-0 p-1 hover:bg-green-100">
            <img src="{{ asset('static') }}/img/basketball-1.png" class="h-4" alt="">
            <span>Basketball</span>
        </a>
        <a href="{{ route('sport', 'hockey') }}"
            class="flex space-x-1 border-b-2 ml-2 last:border-b-0 p-1 hover:bg-green-100">
            <img src="{{ asset('static') }}/img/cricket.png" class="h-4" alt="">
            <span>Hocky</span>
        </a>
        <a href="{{ route('sport', 'Tennis') }}"
            class="flex space-x-1 border-b-2 ml-2 last:border-b-0 p-1 hover:bg-green-100">
            <img src="{{ asset('static') }}/img/tenis.png" class="h-4" alt="">
            <span>Tenis</span>
        </a>
        <a href="{{ route('sport', 'Volleyball') }}"
            class="flex space-x-1 border-b-2 ml-2 last:border-b-0 p-1 hover:bg-green-100">
            <img src="{{ asset('static') }}/img/volyball.png" class="h-4" alt="">
            <span>Voliball</span>
        </a>
        <a href="{{ route('sport', 'TableTennis') }}"
            class="flex space-x-1 border-b-2 ml-2 last:border-b-0 p-1 hover:bg-green-100">
            <img src="{{ asset('static') }}/img/tabletanis.png" class="h-4" alt="">
            <span>Table_Tanis</span>
        </a>
        <a href="{{ route('sport', 'Badminton') }}"
            class="flex space-x-1 border-b-2 ml-2 last:border-b-0 p-1 hover:bg-green-100">
            <img src="{{ asset('static') }}/img/badminton.png" class="h-4" alt="">
            <span>Badminton</span>
        </a>


    </div>
</div>
