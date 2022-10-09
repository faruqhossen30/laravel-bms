<div class="hidden md:block md:col-span-3 bg-emerald-700">
    <div class="bg-emerald-700">
        <h4 class="text-white font-bold p-1 text-center">Upcomming Match</h4>
    </div>
    <div>
        @if (!empty($upcoming_matchs) && count($upcoming_matchs) > 0)
            @foreach ($upcoming_matchs as $key => $match)
                @php
                    $matchDate = $match->date;
                    $date = date('d M Y', strtotime($matchDate));
                    $matchTime = $match->time;
                    $time = date('g:i A', strtotime($matchTime));
                @endphp
                <div class="accordion p-1" id="accordionExample5">
                    <div class="accordion-item bg-white border border-gray-200">
                        <h2 class="accordion-header mb-0" id="headingTwo5">
                            <button
                                class=" accordion-button collapsed relative flex items-center w-full py-2 px-5 text-base text-gray-700 text-left bg-green-100 border-0 rounded-none transition focus:outline-none"
                                type="button" data-bs-toggle="collapse" data-bs-target="#upcommingCollapse{{$match->id}}"
                                aria-expanded="false" aria-controls="upcommingCollapse{{$match->id}}" style="border-radius: 0;">
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
                                        <img class="h-12 w-12" src="{{ asset('static/images/game_icon/boxing.png') }}"
                                            alt="Boxing">
                                    @elseif($match->match_type == 'Tennis')
                                        <img class="h-12 w-12" src="{{ asset('static/images/game_icon/tennis.png') }}"
                                            alt="Tennis">
                                    @elseif($match->match_type == 'Horse Racing')
                                        <img class="h-12 w-12" src="{{ asset('static/images/game_icon/horse.png') }}"
                                            alt="Horse Racing">
                                    @elseif($match->match_type == 'Badminton')
                                        <img class="h-12 w-12"
                                            src="{{ asset('static/images/game_icon/badminton.png') }}" alt="Badminton">
                                    @elseif($match->match_type == 'Ice Hokey')
                                        <img class="h-12 w-12" src="{{ asset('static/images/game_icon/hokey.png') }}"
                                            alt="Ice Hokey">
                                    @elseif($match->match_type == 'Hand Ball')
                                        <img class="h-12 w-12"
                                            src="{{ asset('static/images/game_icon/hand-ball.png') }}" alt="Hand Ball">
                                    @elseif($match->match_type == 'Base Ball')
                                        <img class="h-12 w-12" src="{{ asset('static/images/game_icon/baseball.png') }}"
                                            alt="Base Ball">
                                    @elseif($match->match_type == 'Rugby')
                                        <img class="h-12 w-12"
                                            src="{{ asset('static/images/game_icon/rugby-ball.png') }}" alt="Rugby">
                                    @elseif($match->match_type == 'Snooker')
                                        <img class="h-12 w-12" src="{{ asset('static/images/game_icon/snooker.png') }}"
                                            alt="Snooker">
                                    @elseif($match->match_type == 'Darts')
                                        <img class="h-12 w-12" src="{{ asset('static/images/game_icon/darts.png') }}"
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
                                        <img class="h-12 w-12" src="{{ asset('static/images/game_icon/bandy.png') }}"
                                            alt="Bandy">
                                    @elseif($match->match_type == 'Ludo')
                                        <img class="h-12 w-12" src="{{ asset('static/images/game_icon/ludo.png') }}"
                                            alt="Ludo">
                                    @elseif($match->match_type == 'Lucky Card')
                                        <img class="h-12 w-12"
                                            src="{{ asset('static/images/game_icon/lucky-card.png') }}"
                                            alt="Lucky Card">
                                    @elseif($match->match_type == 'Esports')
                                        <img class="h-12 w-12" src="{{ asset('static/images/game_icon/esports.png') }}"
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
                                        <span>
                                            <i class="fas fa-calendar-alt"></i>
                                            {{ $date }}
                                        </span>
                                        <span>
                                            <i class="far fa-clock"></i>
                                            {{ $time }}
                                        </span>
                                    </div>
                                </div>
                            </button>
                        </h2>
                        <div id="upcommingCollapse{{$match->id}}" class="accordion-collapse collapse" aria-labelledby="headingTwo5">
                            <div class="accordion-body py-2">
                                {{-- <div>
                                    <div class="text-white bg-gray-200 border">
                                        <h4 class="text-gray-600 font-bold p-1">Who win the match</h4>
                                    </div>
                                    <div class="flex justify-between space-x-1 p-2 text-sm">
                                        <div class="flex justify-between bg-emerald-600 w-full rounded-sm ">
                                            <span class="text-white font-bold p-1">Bangladesh</span>
                                            <span class="bg-emerald-800 text-white font-bold p-1 px-4">2.50</span>
                                        </div>
                                        <div class="flex justify-between bg-emerald-600 w-full rounded-sm">
                                            <span class="text-white font-bold p-1">Srilanka</span>
                                            <span class="bg-emerald-800 text-white font-bold p-1 px-4">1.50</span>
                                        </div>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
