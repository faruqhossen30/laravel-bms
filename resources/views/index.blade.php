@extends('layouts.frontend.master')
@section('title', 'Welcome To ' . $bs->site_name)
@section('content')
    <section id="all_games_slide">
        <div class="container bg_w">
            <div class="row games_slider">
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="all">
                        <div class="all_game_item allMatch">
                            <div class="allGame gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/select-all.png') }}" alt="All">
                            </div>
                            <p>All</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="foot-ball">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/football.png') }}" alt="FootBall">
                            </div>
                            <p>FootBall</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="cricket">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/cricket.png') }}" alt="Cricket">
                            </div>
                            <p>Cricket</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="basketball">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/basketball.png') }}" alt="Basketball">
                            </div>
                            <p>Basketball</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="boxing">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/boxing.png') }}" alt="Boxing">
                            </div>
                            <p>Boxing</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="tennis">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/tennis.png') }}" alt="Tennis">
                            </div>
                            <p>Tennis</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="horse-racing">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/horse.png') }}" alt="Horse Racing">
                            </div>
                            <p>Horse Racing</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="badminton">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/badminton.png') }}" alt="Badminton">
                            </div>
                            <p>Badminton</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="ice-hokey">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/hokey.png') }}" alt="Ice Hokey">
                            </div>
                            <p>Ice Hokey</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="hand-ball">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/hand-ball.png') }}" alt="Hand Ball">
                            </div>
                            <p>Hand Ball</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="base-ball">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/baseball.png') }}" alt="Base Ball">
                            </div>
                            <p>Base Ball</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="rugby">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/rugby-ball.png') }}" alt="Rugby">
                            </div>
                            <p>Rugby</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="snooker">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/snooker.png') }}" alt="Snooker">
                            </div>
                            <p>Snooker</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="darts">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/darts.png') }}" alt="Darts">
                            </div>
                            <p>Darts</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="table-tennis">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/table-tennis.png') }}" alt="Table Tennis">
                            </div>
                            <p>Table Tennis</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="beach-volley">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/volleyball.png') }}" alt="Beach Volley">
                            </div>
                            <p>Beach Volley</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="floor-ball">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/floor-ball.png') }}" alt="Floor Ball">
                            </div>
                            <p>Floor Ball</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="bandy">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/bandy.png') }}" alt="Bandy">
                            </div>
                            <p>Bandy</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="ludo">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/dice.png') }}" alt="Ludo">
                            </div>
                            <p>Ludo</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="lucky-card">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/lucky-card.png') }}" alt="Lucky Card">
                            </div>
                            <p>Lucky Card</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="esports">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/esports.png') }}" alt="Esports">
                            </div>
                            <p>Esports</p>
                        </div>
                    </a>
                </div>
                <div class="col-2 bor-r">
                    <a href="javascript:void(0);" class="filter-match" data-type="volleyball">
                        <div class="all_game_item">
                            <div class="gam_img text-center">
                                <img src="{{ asset('static/images/game_icon/volleyball-one.png') }}" alt="Volleyball">
                            </div>
                            <p>Volleyball</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section id="all_bit_games">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <div class="live_match">
                        <div class="live_match_head">
                            <h2>Live Match</h2>
                        </div>
                        <div class="live_match_list">
                            @if (!empty($live_matchs) && count($live_matchs) > 0)
                                @foreach ($live_matchs as $key => $match)
                                    @php
                                        $matchDate = $match->date;
                                        $date = date('d M Y', strtotime($matchDate));
                                        $matchTime = $match->time;
                                        $time = date('g:i A', strtotime($matchTime));
                                    @endphp
                                    <div
                                        class="card game filter {{ strtolower(str_replace(' ', '-', $match->match_type)) }}">
                                        <div class="card-header" id="heading{{ $match->id }}">
                                            <button class="btn btn-link match-open" type="button"
                                                data-match="{{ $match->id }}">
                                                <div class="panel-title">
                                                    <div class="panel-title-img">
                                                        @if ($match->match_type == 'FootBall')
                                                            <img src="{{ asset('static/images/game_icon/football-play-match.png') }}"
                                                                alt="FootBall">
                                                        @elseif($match->match_type == 'Cricket')
                                                            <img src="{{ asset('static/images/game_icon/cricket-logo.png') }}"
                                                                alt="Cricket">
                                                        @elseif($match->match_type == 'Basketball')
                                                            <img src="{{ asset('static/images/game_icon/basketball.png') }}"
                                                                alt="Basketball">
                                                        @elseif($match->match_type == 'Boxing')
                                                            {
                                                            <img src="{{ asset('static/images/game_icon/boxing.png') }}"
                                                                alt="Boxing">
                                                        @elseif($match->match_type == 'Tennis')
                                                            <img src="{{ asset('static/images/game_icon/tennis.png') }}"
                                                                alt="Tennis">
                                                        @elseif($match->match_type == 'Horse Racing')
                                                            <img src="{{ asset('static/images/game_icon/horse.png') }}"
                                                                alt="Horse Racing">
                                                        @elseif($match->match_type == 'Badminton')
                                                            <img src="{{ asset('static/images/game_icon/badminton.png') }}"
                                                                alt="Badminton">
                                                        @elseif($match->match_type == 'Ice Hokey')
                                                            <img src="{{ asset('static/images/game_icon/hokey.png') }}"
                                                                alt="Ice Hokey">
                                                        @elseif($match->match_type == 'Hand Ball')
                                                            <img src="{{ asset('static/images/game_icon/hand-ball.png') }}"
                                                                alt="Hand Ball">
                                                        @elseif($match->match_type == 'Base Ball')
                                                            <img src="{{ asset('static/images/game_icon/baseball.png') }}"
                                                                alt="Base Ball">
                                                        @elseif($match->match_type == 'Rugby')
                                                            <img src="{{ asset('static/images/game_icon/rugby-ball.png') }}"
                                                                alt="Rugby">
                                                        @elseif($match->match_type == 'Snooker')
                                                            <img src="{{ asset('static/images/game_icon/snooker.png') }}"
                                                                alt="Snooker">
                                                        @elseif($match->match_type == 'Darts')
                                                            <img src="{{ asset('static/images/game_icon/darts.png') }}"
                                                                alt="Darts">
                                                        @elseif($match->match_type == 'Table Tennis')
                                                            <img src="{{ asset('static/images/game_icon/table-tennis.png') }}"
                                                                alt="Table Tennis">
                                                        @elseif($match->match_type == 'Beach Volley')
                                                            <img src="{{ asset('static/images/game_icon/volleyball.png') }}"
                                                                alt="Beach Volley">
                                                        @elseif($match->match_type == 'Floor Ball')
                                                            <img src="{{ asset('static/images/game_icon/floor-ball.png') }}"
                                                                alt="Floor Ball">
                                                        @elseif($match->match_type == 'Bandy')
                                                            <img src="{{ asset('static/images/game_icon/bandy.png') }}"
                                                                alt="Bandy">
                                                        @elseif($match->match_type == 'Ludo')
                                                            <img src="{{ asset('static/images/game_icon/ludo.png') }}"
                                                                alt="Ludo">
                                                        @elseif($match->match_type == 'Lucky Card')
                                                            <img src="{{ asset('static/images/game_icon/lucky-card.png') }}"
                                                                alt="Lucky Card">
                                                        @elseif($match->match_type == 'Esports')
                                                            <img src="{{ asset('static/images/game_icon/esports.png') }}"
                                                                alt="Esports">
                                                        @elseif($match->match_type == 'Volleyball')
                                                            <img src="{{ asset('static/images/game_icon/volleyball-one.png') }}"
                                                                alt="Volleyball">
                                                        @endif
                                                    </div>
                                                    <div class="panel-title-right">
                                                        <h5>{{ $match->team_one }} <img
                                                                src="{{ asset('static/images/vs.png') }}" alt="VS">
                                                            {{ $match->team_two }} </h5>
                                                        <p>{{ $match->bet_statement }}
                                                            <br>
                                                            <span><img src="{{ asset('static/images/calander.png') }}"
                                                                    style="width: 15px;" alt="Calander">
                                                                {{ $date }}
                                                                <img src="{{ asset('static/images/clock.png') }}"
                                                                    style="width: 15px;" alt="Clock">
                                                                {{ $time }}
                                                            </span>
                                                            <br>
                                                            <img class="live-gif"
                                                                src="{{ asset('static/images/live.gif') }}"
                                                                alt="Live">
                                                        </p>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="match-open-{{ $match->id }}">
                                            @if (!empty($match->questions) && $match->questions->count())
                                                <div id="collapse{{ $match->id }}" class="collapse show"
                                                    aria-labelledby="heading{{ $match->id }}"
                                                    data-parent="#accordionExample">
                                                    @foreach ($match->questions as $key => $question)
                                                        @if ($question->status == 'active' && $question->is_hide == '0')
                                                            <div class="card-body">
                                                                <div class="panel-heading second-lebal">
                                                                    <h4 style="cursor: pointer" class="panel-title-2"
                                                                        role="button" data-toggle="collapse"
                                                                        href="#one{{ $question->id }}"
                                                                        aria-expanded="true"
                                                                        aria-controls="#one{{ $question->id }}">
                                                                        {{ $question->name }}
                                                                    </h4>
                                                                </div>
                                                                <div id="one{{ $question->id }}"
                                                                    class="panel-collapse collapse show" role="tabpanel"
                                                                    aria-labelledby="">
                                                                    <div class="panel-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                @if (!empty($question->options) && $match->questions->count())
                                                                                    @foreach ($question->options as $key => $option)
                                                                                        @if ($option->status == 'active' && $option->is_hide == '0')
                                                                                            <div
                                                                                                class="col btn btn-default data-show buttonrate">
                                                                                                <div class="rate_s {{ $match->is_active == '1' && $question->is_active == '1' ? 'betInfo' : '' }}"
                                                                                                    data-id="{{ $option->id }}">
                                                                                                    <span
                                                                                                        class="option">{{ $option->name }}<br />
                                                                                                        <span
                                                                                                            class="option-ratio"><b>
                                                                                                                {{ number_format($option->bet_rate, 2) }}
                                                                                                            </b></span>
                                                                                                        <br /><br />
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="upcoming_match">
                        <div class="upcoming_match_head">
                            <h2>Upcoming Match</h2>
                        </div>
                        <div class="upcoming_match_list">
                            @if (!empty($upcoming_matchs) && count($upcoming_matchs) > 0)
                                @foreach ($upcoming_matchs as $key => $match)
                                    @php
                                        $matchDate = $match->date;
                                        $date = date('d M Y', strtotime($matchDate));
                                        $matchTime = $match->time;
                                        $time = date('g:i A', strtotime($matchTime));
                                    @endphp
                                    <div
                                        class="card game filter {{ strtolower(str_replace(' ', '-', $match->match_type)) }}">
                                        <div class="card-header" id="heading{{ $match->id }}">
                                            <button class="btn btn-link match-open" type="button"
                                                data-match="{{ $match->id }}">
                                                <div class="panel-title">
                                                    <div class="panel-title-img">
                                                        @if ($match->match_type == 'FootBall')
                                                            <img src="{{ asset('static/images/game_icon/football-play-match.png') }}"
                                                                alt="FootBall">
                                                        @elseif($match->match_type == 'Cricket')
                                                            <img src="{{ asset('static/images/game_icon/cricket-logo.png') }}"
                                                                alt="Cricket">
                                                        @elseif($match->match_type == 'Basketball')
                                                            <img src="{{ asset('static/images/game_icon/basketball.png') }}"
                                                                alt="Basketball">
                                                        @elseif($match->match_type == 'Boxing')
                                                            {
                                                            <img src="{{ asset('static/images/game_icon/boxing.png') }}"
                                                                alt="Boxing">
                                                        @elseif($match->match_type == 'Tennis')
                                                            <img src="{{ asset('static/images/game_icon/tennis.png') }}"
                                                                alt="Tennis">
                                                        @elseif($match->match_type == 'Horse Racing')
                                                            <img src="{{ asset('static/images/game_icon/horse.png') }}"
                                                                alt="Horse Racing">
                                                        @elseif($match->match_type == 'Badminton')
                                                            <img src="{{ asset('static/images/game_icon/badminton.png') }}"
                                                                alt="Badminton">
                                                        @elseif($match->match_type == 'Ice Hokey')
                                                            <img src="{{ asset('static/images/game_icon/hokey.png') }}"
                                                                alt="Ice Hokey">
                                                        @elseif($match->match_type == 'Hand Ball')
                                                            <img src="{{ asset('static/images/game_icon/hand-ball.png') }}"
                                                                alt="Hand Ball">
                                                        @elseif($match->match_type == 'Base Ball')
                                                            <img src="{{ asset('static/images/game_icon/baseball.png') }}"
                                                                alt="Base Ball">
                                                        @elseif($match->match_type == 'Rugby')
                                                            <img src="{{ asset('static/images/game_icon/rugby-ball.png') }}"
                                                                alt="Rugby">
                                                        @elseif($match->match_type == 'Snooker')
                                                            <img src="{{ asset('static/images/game_icon/snooker.png') }}"
                                                                alt="Snooker">
                                                        @elseif($match->match_type == 'Darts')
                                                            <img src="{{ asset('static/images/game_icon/darts.png') }}"
                                                                alt="Darts">
                                                        @elseif($match->match_type == 'Table Tennis')
                                                            <img src="{{ asset('static/images/game_icon/table-tennis.png') }}"
                                                                alt="Table Tennis">
                                                        @elseif($match->match_type == 'Beach Volley')
                                                            <img src="{{ asset('static/images/game_icon/volleyball.png') }}"
                                                                alt="Beach Volley">
                                                        @elseif($match->match_type == 'Floor Ball')
                                                            <img src="{{ asset('static/images/game_icon/floor-ball.png') }}"
                                                                alt="Floor Ball">
                                                        @elseif($match->match_type == 'Bandy')
                                                            <img src="{{ asset('static/images/game_icon/bandy.png') }}"
                                                                alt="Bandy">
                                                        @elseif($match->match_type == 'Ludo')
                                                            <img src="{{ asset('static/images/game_icon/ludo.png') }}"
                                                                alt="Ludo">
                                                        @elseif($match->match_type == 'Lucky Card')
                                                            <img src="{{ asset('static/images/game_icon/lucky-card.png') }}"
                                                                alt="Lucky Card">
                                                        @elseif($match->match_type == 'Esports')
                                                            <img src="{{ asset('static/images/game_icon/esports.png') }}"
                                                                alt="Esports">
                                                        @elseif($match->match_type == 'Volleyball')
                                                            <img src="{{ asset('static/images/game_icon/volleyball-one.png') }}"
                                                                alt="Volleyball">
                                                        @endif
                                                    </div>
                                                    <div class="panel-title-right">
                                                        <h5>{{ $match->team_one }} <img
                                                                src="{{ asset('static/images/vs.png') }}" alt="VS">
                                                            {{ $match->team_two }} </h5>
                                                        <p>{{ $match->bet_statement }}
                                                            <br>
                                                            <span><img src="{{ asset('static/images/calander.png') }}"
                                                                    style="width: 15px;" alt="Calander">
                                                                {{ $date }}
                                                                <img src="{{ asset('static/images/clock.png') }}"
                                                                    style="width: 15px;" alt="Clock">
                                                                {{ $time }}
                                                            </span>
                                                            <br>
                                                            <img class="live-gif"
                                                                src="{{ asset('static/images/upcoming.png') }}"
                                                                alt="Upcoming">
                                                        </p>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="match-open-{{ $match->id }}">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <div class="p-3">
        </div>
    </section>
    @auth
        <div class="user-loggedin"></div>
    @endauth
@endsection
