@extends('layouts.frontend.master')
@section('title', 'Welcome To ' . $bs->site_name)
@section('content')
    @include('inc.marque')
    <section class="p-1">
        <div class="grid grid-cols-12 gap-1">
            @include('inc.leftsidebar')
            <div class="col-span-12 md:col-span-7 bg-white">
                <div class="flex items-center bg-emerald-700 text-white text-sm overflow-x-auto">
                    <a href="{{ route('index') }}"
                        class="flex items-center space-x-2 px-2 py-1 @if (request()->is('/')) border-b-4 border-yellow-400 @endif">
                        <img src="{{ asset('static') }}/img/footbal.png" class="h-4" alt="">
                        <span>All</span>
                    </a>
                    <a href="{{ route('sport', 'Cricket') }}" class="flex items-center space-x-2 px-2 py-1 ">
                        <img src="{{ asset('static') }}/img/cricket.png" class="h-4" alt="">
                        <span>Cricket</span>
                    </a>
                    <a href="{{ route('sport', 'FootBall') }}" class="flex items-center space-x-2 px-2 py-1">
                        <img src="{{ asset('static') }}/img/footbal.png" class="h-4" alt="">
                        <span>Football</span>
                    </a>
                    <a href="{{ route('sport', 'Basketball') }}" class="flex items-center space-x-2 px-2 py-1">
                        <img src="{{ asset('static') }}/img/basketball-1.png" class="h-4" alt="">
                        <span>Basketball</span>
                    </a>
                    <a href="{{ route('sport', 'hockey') }}" class="flex items-center space-x-2 px-2 py-1">
                        <img src="{{ asset('static') }}/img/cricket.png" class="h-4" alt="">
                        <span>Hocky</span>
                    </a>
                    <a href="{{ route('sport', 'Tennis') }}" class="flex items-center space-x-2 px-2 py-1">
                        <img src="{{ asset('static') }}/img/tenis.png" class="h-4" alt="">
                        <span>Tenis</span>
                    </a>
                    <a href="{{ route('sport', 'Volleyball') }}" class="flex items-center space-x-2 px-2 py-1">
                        <img src="{{ asset('static') }}/img/volyball.png" class="h-4" alt="">
                        <span>Voliball</span>
                    </a>
                    <a href="{{ route('sport', 'TableTennis') }}" class="flex items-center space-x-2 px-2 py-1">
                        <img src="{{ asset('static') }}/img/tabletanis.png" class="h-4" alt="">
                        <span>Table_Tanis</span>
                    </a>
                    <a href="{{ route('sport', 'Badminton') }}" class="flex items-center space-x-2 px-2 py-1">
                        <img src="{{ asset('static') }}/img/badminton.png" class="h-4" alt="">
                        <span>Badminton</span>
                    </a>
                </div>

                <div class="bg-emerald-700 m-1 p-1">
                    <h4 class="text-white font-bold p-1 text-left">Live Match <span><i
                                class="fas fa-circle text-red-600"></i></span></h4>
                </div>
                <!-- Accroding -->
                <div>
                    @if (!empty($live_matchs) && count($live_matchs) > 0)
                        @foreach ($live_matchs as $key => $match)
                            @php
                                $matchDate = $match->date;
                                $date = date('d M Y', strtotime($matchDate));
                                $matchTime = $match->time;
                                $time = date('g:i A', strtotime($matchTime));
                            @endphp
                            <div class="accordion p-1" id="accordionExample5">
                                <div class="accordion-item bg-white border border-gray-200">
                                    <h2 class="accordion-header mb-0 bg-green-100 flex" id="headingTwo5">
                                        <button
                                            class=" accordion-button collapsed relative flex items-center w-full py-2 px-5 text-base text-gray-700 text-left bg-green-100 border-0 rounded-none transition focus:outline-none"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $match->id }}" aria-expanded="false"
                                            aria-controls="collapse{{ $match->id }}" style="border-radius: 0;">
                                            <div class="shrink-0">
                                                @if ($match->match_type == 'FootBall')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/football-play-match.png') }}"
                                                        alt="FootBall">
                                                @elseif($match->match_type == 'Cricket')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/cricket-logo.png') }}"
                                                        alt="Cricket">
                                                @elseif($match->match_type == 'Basketball')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/basketball.png') }}"
                                                        alt="Basketball">
                                                @elseif($match->match_type == 'Boxing')
                                                    {
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/boxing.png') }}"
                                                        alt="Boxing">
                                                @elseif($match->match_type == 'Tennis')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/tennis.png') }}"
                                                        alt="Tennis">
                                                @elseif($match->match_type == 'Horse Racing')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/horse.png') }}"
                                                        alt="Horse Racing">
                                                @elseif($match->match_type == 'Badminton')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/badminton.png') }}"
                                                        alt="Badminton">
                                                @elseif($match->match_type == 'Ice Hokey')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/hokey.png') }}"
                                                        alt="Ice Hokey">
                                                @elseif($match->match_type == 'Hand Ball')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/hand-ball.png') }}"
                                                        alt="Hand Ball">
                                                @elseif($match->match_type == 'Base Ball')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/baseball.png') }}"
                                                        alt="Base Ball">
                                                @elseif($match->match_type == 'Rugby')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/rugby-ball.png') }}"
                                                        alt="Rugby">
                                                @elseif($match->match_type == 'Snooker')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/snooker.png') }}"
                                                        alt="Snooker">
                                                @elseif($match->match_type == 'Darts')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/darts.png') }}"
                                                        alt="Darts">
                                                @elseif($match->match_type == 'Table Tennis')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/table-tennis.png') }}"
                                                        alt="Table Tennis">
                                                @elseif($match->match_type == 'Beach Volley')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/volleyball.png') }}"
                                                        alt="Beach Volley">
                                                @elseif($match->match_type == 'Floor Ball')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/floor-ball.png') }}"
                                                        alt="Floor Ball">
                                                @elseif($match->match_type == 'Bandy')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/bandy.png') }}"
                                                        alt="Bandy">
                                                @elseif($match->match_type == 'Ludo')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/ludo.png') }}"
                                                        alt="Ludo">
                                                @elseif($match->match_type == 'Lucky Card')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/lucky-card.png') }}"
                                                        alt="Lucky Card">
                                                @elseif($match->match_type == 'Esports')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/esports.png') }}"
                                                        alt="Esports">
                                                @elseif($match->match_type == 'Volleyball')
                                                    <img class="h-12 w-12"
                                                        src="{{ asset('static/images/game_icon/volleyball-one.png') }}"
                                                        alt="Volleyball">
                                                @endif
                                            </div>
                                            <div class="flex flex-col ml-2">
                                                <span class="font-semibold">{{ $match->team_one }} vs
                                                    {{ $match->team_two }}</span>
                                                <span
                                                    class="text-orange-700 text-sm font-semibold">{{ $match->bet_statement }}</span>
                                                <div class="text-sm">
                                                    <span> <i class="fas fa-calendar-alt"></i> {{ $date }} </span>
                                                    <span> <i class="far fa-clock"></i> {{ $time }} </span>
                                                </div>
                                            </div>
                                        </button>
                                        <img src="{{ asset('static') }}/img/live.gif" class="h-4 m-2" alt="">
                                    </h2>
                                    <div id="collapse{{ $match->id }}" class="accordion-collapse collapse "
                                        aria-labelledby="headingTwo5">
                                        <div class="accordion-body py-2">
                                            @if (!empty($match->questions) && $match->questions->count())
                                                @foreach ($match->questions as $key => $question)
                                                    @if ($question->status == 'active' && $question->is_hide == '0')
                                                        <div>
                                                            <div class="text-white bg-gray-200 border">
                                                                <h4 class="text-gray-600 font-semibold p-1">
                                                                    {{ $question->name }}</h4>
                                                            </div>
                                                            <div class="flex justify-between space-x-1 p-2 text-sm">
                                                                @if (!empty($question->options) && $match->questions->count())
                                                                    @foreach ($question->options as $key => $option)
                                                                        @if ($option->status == 'active' && $option->is_hide == '0')
                                                                            <div class="flex justify-between bg-emerald-600 w-full rounded-sm cursor-pointer {{ $match->is_active == '1' && $question->is_active == '1' ? 'betInfo' : '' }}"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#betModal"
                                                                                data-id="{{ $option->id }}">
                                                                                <span
                                                                                    class="text-white font-light p-1">{{ $option->name }}</span>
                                                                                <span
                                                                                    class="bg-emerald-800 text-white font-light p-1 px-4">{{ number_format($option->bet_rate, 2) }}</span>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <!-- Sidebar start -->
            @include('inc.rightsidebar')
            <!-- Sidebar end -->
        </div>
    </section>
@endsection
