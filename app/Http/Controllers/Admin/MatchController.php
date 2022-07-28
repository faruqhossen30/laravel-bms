<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Match;
use App\Models\Question;
use App\Models\Option;
use App\Models\HideFromPanel;
use App\Models\AutoQuestion;
use App\Models\AutoOption;

class MatchController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:Match');
    }

    protected function matchIsHide($id)
    {
        $match = HideFromPanel::where('match_id', $id)
            ->where('user_id', auth()->user()->id)
            ->first();
        if ($match) {
            return true;
        } else {
            return false;
        }
    }

    protected function matchAutoQuestion($id, $match_type, $team_1, $team_2)
    {
        $questions = AutoQuestion::orderBy('id', 'ASC')
            ->where('match_type', $match_type)
            ->where('status', 'active')
            ->get();
        if (!empty($questions)) {
            foreach ($questions as $key => $question) {
                $addQuestion = Question::create([
                    'name' => $question->name,
                    'match_id' => $id
                ]);

                if (!empty($question->options) && $question->options->count()) {
                    foreach ($question->options as $key => $option) {
                        $name = $option->name;
                        if ($option->status == 'active') {
                            if ($option->name == '#team-1#') {
                                $name = $team_1;
                            } elseif ($option->name == '#team-2#') {
                                $name = $team_2;
                            }

                            Option::create([
                                'name' => $name,
                                'question_id' => $addQuestion->id,
                                'match_id' => $id,
                                'bet_rate' => $option->bet_rate
                            ]);
                        }
                    }
                }
            }
        }
    }

    // All matches
    public function index(){


        // return rand();
        $matchs = Match::orderBy('date','ASC')->orderBy('time','ASC')->where('status','live')->get();
        foreach ($matchs as $key => $match) {
        if ($this->matchIsHide($match->id) == false) {
        $matchDate = $match->date;
        $date = date("d M Y", strtotime($matchDate));
        $matchTime = $match->time;
            $time  = date("g:i A", strtotime($matchTime));
            echo '<div class="live_match_tbl" id="' . 'match' . $match->id . '"' . '>';
            echo '<p><span>';
			if ($match->match_type == 'FootBall') {
				echo '<img src="' . url('static/images/game_icon/football.png') . '" alt="FootBall">';
			};
			if ($match->match_type == 'Cricket') {
				echo '<img src="' . url('static/images/game_icon/cricket.png') . '" alt="Cricket">';
			};
			if ($match->match_type == 'Basketball') {
				echo '<img src="' . url('static/images/game_icon/basketball.png') . '" alt="Basketball">';
			};
			if ($match->match_type == 'Boxing') {
				echo '<img src="'.url('static/images/game_icon/boxing.png').'" alt="Boxing"'. $match->match_type . '">';
			};
			if ($match->match_type == 'Tennis') {
				echo '<img src="' . url('static/images/game_icon/tennis.png') . '" alt="Tennis">';
			};
			if ($match->match_type == 'Horse Racing') {
				echo '<img src="' . url('static/images/game_icon/horse.png') . '" alt="Horse Racing">';
			};
			if ($match->match_type == 'Badminton') {
				echo '<img src="' . url('static/images/game_icon/badminton.png') . '" alt="Badminton">';
			};
			if ($match->match_type == 'Ice Hokey') {
				echo '<img src="'.url('static/images/game_icon/hokey.png').'" alt="Ice Hokey"'. $match->match_type . '">';
			};
			if ($match->match_type == 'Hand Ball') {
				echo '<img src="' . url('static/images/game_icon/hand-ball.png') . '" alt="Hand Ball"'. $match->match_type . '">';
			};
			if ($match->match_type == 'Base Ball') {
				echo '<img src="' . url('static/images/game_icon/baseball.png') . '" alt="Base Ball">';
			};
			if ($match->match_type == 'Rugby') {
				echo '<img src="' . url('static/images/game_icon/rugby-ball.png') . '" alt="Rugby">';
			};
			if ($match->match_type == 'Snooker') {
				echo '<img src="'.url('static/images/game_icon/snooker.png').'" alt="Snooker"'. $match->match_type . '">';
			};
			if ($match->match_type == 'Darts') {
				echo '<img src="'.url('static/images/game_icon/darts.png').'" alt="Darts"'. $match->match_type . '">';
			};
			if ($match->match_type == 'Table Tennis') {
				echo '<img src="' . url('static/images/game_icon/table-tennis.png') . '" alt="Table Tennis">';
			};
			if ($match->match_type == 'Beach Volley') {
				echo '<img src="' . url('static/images/game_icon/volleyball.png') . '" alt="Beach Volley">';
			};
			if ($match->match_type == 'Floor Ball') {
				echo '<img src="' . url('static/images/game_icon/floor-ball.png') . '" alt="Floor Ball">';
			};
			if ($match->match_type == 'Bandy') {
				echo '<img src="'.url('static/images/game_icon/bandy.png').'" alt="Bandy"'. $match->match_type . '">';
			};
			if ($match->match_type == 'Ludo') {
				echo '<img src="' . url('static/images/game_icon/ludo.png') . '" alt="Ludo">';
			};
			if ($match->match_type == 'Lucky Card') {
				echo '<img src="' . url('static/images/game_icon/lucky-card.png') . '" alt="Lucky Card">';
			};
			if ($match->match_type == 'Esports') {
				echo '<img src="' . url('static/images/game_icon/esports.png') . '" alt="Esports">';
			};
			if ($match->match_type == 'Volleyball') {
				echo '<img src="'.url('static/images/game_icon/volleyball-one.png').'" alt="Volleyball"'. $match->match_type . '">';
			};
					echo $match->team_one . ' vs ' . $match->team_two . ' || ' . $match->bet_statement . ' || ' . $date . ' || ' . $time . '</span> <span class="badge badge-secondary">' . $match->bets->count() . '</span> <span class="badge badge-info"> ' . $match->bets->sum('predict_amount') . '</span></p>';
            echo '<div class="table_list_item ds_2">
        <ul>
         <li>
         <button class="btn btn-primary" id="action_modal" data-id="' . $match->id . '"' . '>
           Action
         </button>
           </li>
            <li>
                <button class="btn btn-primary add-question" value="' . $match->id . '">
                  Add Question
                </button>
            </li>
            <li>';
            if ($match->is_hide_question == 0) {
                echo '<button class="btn btn-primary hide-match-question" data-id="' . $match->id . '"' . '>
                Hide Question
                </button>';
            } else {
                echo '<button class="btn btn-primary bg-danger show-match-question" data-id="' . $match->id . '"' . '>
                Show Question
                </button>';
            }
            echo '<li>
           <button class="btn btn-primary match-limit" data-id="' . $match->id . '"> Limit (' . $match->bet_limit . ')  </button>
            </li>';
            if ($match->is_active == 1) {
                echo  '<li>
              <a href="javascript:void(0)" class="match-deactive"' . 'data-id="' . $match->id . '"> Stop  </a>
            </li>';
            } else {
                echo  '<li>
           <a href="javascript:void(0)" class="match-active bg-danger"' . 'data-id="' . $match->id . '"> Active  </a>
          </li>';
            }
            if ($match->is_hide == 1) {
                echo  '<li>
            <a href="javascript:void(0)" class="match-show bg-danger"' . 'data-id="' . $match->id . '"> Show  </a>
            </li>';
            } else {
                echo  '<li>
             <a href="javascript:void(0)" class="match-hide"' . 'data-id="' . $match->id . '"> Hide  </a>
          </li>';
            }
            if ($match->is_area_hide == 1) {
                echo  '<li>
            <a href="javascript:void(0)" class="area-show bg-danger"' . 'data-id="' . $match->id . '"> Area Show  </a>
              </li>';
            } else {
                echo  '<li>
            <a href="javascript:void(0)" class="area-hide"' . 'data-id="' . $match->id . '"> Area Hide  </a>
             </li>';
            }

            echo '<li>
           <a href="javascript:void(0)" class="hide-from-panel bg-danger"' . 'data-id="' . $match->id . '"> Hide From Panel  </a>
           </li>
            </ul>
           </div></div>';


           if ($match->is_area_hide == 0) {
            if (!empty($match->questions) && $match->questions->count()) {
                if ($match->is_hide_question == 0) {
                    foreach ($match->questions as $key => $question) {
                        if ($question->status != 'close') {
                            echo '<div class="live_match_tbl bg-dark">
                            <div class="table_list_item">
                                <ul>
                                    <span class="c_black">' . $question->name . '</span>
                                    <li>
                                    <button class="btn btn-primary" id="question_action" data-id="' . $question->id . '"' . '>
                                    Action
                                  </button>
                                    </li>';
                            echo '<li>
                                    <button class="btn btn-primary question-limit" data-id="' . $question->id . '"> Limit (' . $question->bet_limit . ')  </a>
                                     </li>';
                            if ($question->is_active == 1) {
                                echo  '<li>
                              <a href="javascript:void(0)" class="question-deactive"' . 'data-id="' . $question->id . '"> Stop  </a>
                             </li>';
                            } else {
                                echo  '<li>
                                 <a href="javascript:void(0)" class="question-active bg-danger"' . 'data-id="' . $question->id . '"> Active  </a>
                             </li>';
                            }
                            if ($question->is_hide == 1) {
                                echo  '<li>
                          <a href="javascript:void(0)" class="question-show bg-danger"' . 'data-id="' . $question->id . '"> Show  </a>
                         </li>';
                            } else {
                                echo  '<li>
                             <a href="javascript:void(0)" class="question-hide"' . 'data-id="' . $question->id . '"> Hide  </a>
                         </li>';
                            }
                            if ($question->is_area_hide == 1) {
                                echo  '<li>
                              <a href="javascript:void(0)" class="question-area-show bg-danger"' . 'data-id="' . $question->id . '"> Area Show  </a>
                          </li>';
                            } else {
                                echo  '<li>
                                 <a href="javascript:void(0)" class="question-area-hide"' . 'data-id="' . $question->id . '"> Area Hide  </a>
                             </li>';
                            }
                            echo '<li class="bg2">
                            <span class="badge badge-secondary">' . $question->bets->count() . '</span> <span class="badge badge-info"> ' . $question->bets->sum('predict_amount') . '</span>
                                    </li>
                                </ul>
                            </div>
                        </div>';

                            if ($question->is_area_hide != '1') {

                                if (!empty($question->options) && $question->options->count()) {
                                    echo '<div class="table-responsive">
                                   <table class="table table-bordered" id="example3">
                <thead>
                    <tr>
                        <th scope="col">Answer</th>
                        <th scope="col">Bet Rate</th>
                        <th scope="col">Place Bet</th>
                        <th scope="col">Betting Amount</th>
                        <th scope="col">Return Amount</th>
                        <th scope="col">Action</th>
                        <th scope="col">Limit</th>
                    </tr>
                </thead>
                <tbody>';

                                    foreach ($question->options as $key => $option) {
                                        if ($option->status != 'close') {
                                            echo '<tr>
                           <th scope="row">
                            <div class="edit-option btn btn-primary" data-id="' . $option->id . '">' . $option->name . '
                            </div>
                            </th>
                            <td>
                            <div class="edit-option btn btn-primary" data-id="' . $option->id . '">' . number_format($option->bet_rate, 2) . '
                            </div>
                            </td>
                            <td>' . $option->bets->count() . '</td>
                            <td>' . $option->bets->sum('predict_amount') . '</td>
                            <td>' . $option->bets->sum('return_amount') . '</td>
                            <td>';
                                 if ($option->is_win == '0' && ($option->is_loss == '0')){
                                                echo '<button type="button" id="option-win" class="btn btn-sm btn-primary mr-1" data-id="' . $option->id . '">Win</button>';
                                            }
                                if ($option->is_win == '1') {
                                    echo '<button type="button" class="btn btn-sm btn-success mr-1">Wined</button>';
                                }

                                if ($option->is_loss == '1'){
                                             echo '<button type="button" class="btn btn-sm btn-danger m-1">Loss</button>';
                                            }
                                            echo '<a class="btn btn-sm btn-primary m-1"  href="'.url('tib-admin/all-bets?option='.$option->id).'" id="user-action">Bets</a>';
                                            if ($option->status == 'active') {
                                                echo '<a class="btn btn-sm btn-danger m-1"  href="javascript:void(0)" id="option-stop" data-id="' . $option->id . '">Stop</a>';
                                            } else {
                                                echo '<a class="btn btn-sm btn-success m-1"  href="javascript:void(0)" id="option-run" data-id="' . $option->id . '">Run</a>';
                                            }
                                            if ($option->is_hide == '1') {
                                                echo '<a class="btn btn-sm btn-info m-1"  href="javascript:void(0)" id="option-show" data-id="' . $option->id . '">Show</a>';
                                            } else {
                                                echo '<a class="btn btn-sm btn-secondary m-1"  href="javascript:void(0)" id="option-hide" data-id="' . $option->id . '">Hide</a>';
                                            }

                                            echo '<a class="btn btn-sm btn-dark" href="javascript:void(0)" id="option-close" data-id="' . $option->id . '">Close</a>

                            </td>
                            <td>
                            <button class="btn btn-primary" id="option-limit" data-id="' . $option->id . '"> Limit (' . $option->bet_limit . ')  </button></td>
                        </tr>';
                                        }
                                    }

                                    echo  '<tfoot>
                                <tr>
                                <th> </th>
                                <th> </th>
                                <th> Total : ' . $question->bets->count() . '</th>
                                <th> Total : ' . $question->bets->sum('predict_amount') . '</th>
                                <th> Total : ' . $question->bets->sum('return_amount') . '</th>
                                <th> <button type="button" class="btn btn-danger restart" data-id="' . $question->id . '">Restart</button> </th>
                                </tr>
                             </tfoot>
                             </tbody>
                             </table>
                             </div>';
                                }
                            }
                        }
                    }
                }
            }
        }

        }
        }
    }

    // Upcoming Match

    public function upcomingMatch()
    {
        $matchs = Match::orderBy('date','ASC')->orderBy('time','ASC')->where('status','upcoming')->get();
        foreach ($matchs as $key => $match) {
        if ($this->matchIsHide($match->id) == false) {
        $matchDate = $match->date;
        $date = date("d M Y", strtotime($matchDate));
        $matchTime = $match->time;
            $time  = date("g:i A", strtotime($matchTime));
            echo '<div class="live_match_tbl bg-info" id="' . 'match' . $match->id . '"' . '>';
            echo '<p><span>';
			if ($match->match_type == 'FootBall') {
				echo '<img src="' . url('static/images/game_icon/football.png') . '" alt="FootBall">';
			};
			if ($match->match_type == 'Cricket') {
				echo '<img src="' . url('static/images/game_icon/cricket.png') . '" alt="Cricket">';
			};
			if ($match->match_type == 'Basketball') {
				echo '<img src="' . url('static/images/game_icon/basketball.png') . '" alt="Basketball">';
			};
			if ($match->match_type == 'Boxing') {
				echo '<img src="'.url('static/images/game_icon/boxing.png').'" alt="Boxing"'. $match->match_type . '">';
			};
			if ($match->match_type == 'Tennis') {
				echo '<img src="' . url('static/images/game_icon/tennis.png') . '" alt="Tennis">';
			};
			if ($match->match_type == 'Horse Racing') {
				echo '<img src="' . url('static/images/game_icon/horse.png') . '" alt="Horse Racing">';
			};
			if ($match->match_type == 'Badminton') {
				echo '<img src="' . url('static/images/game_icon/badminton.png') . '" alt="Badminton">';
			};
			if ($match->match_type == 'Ice Hokey') {
				echo '<img src="'.url('static/images/game_icon/hokey.png').'" alt="Ice Hokey"'. $match->match_type . '">';
			};
			if ($match->match_type == 'Hand Ball') {
				echo '<img src="' . url('static/images/game_icon/hand-ball.png') . '" alt="Hand Ball"'. $match->match_type . '">';
			};
			if ($match->match_type == 'Base Ball') {
				echo '<img src="' . url('static/images/game_icon/baseball.png') . '" alt="Base Ball">';
			};
			if ($match->match_type == 'Rugby') {
				echo '<img src="' . url('static/images/game_icon/rugby-ball.png') . '" alt="Rugby">';
			};
			if ($match->match_type == 'Snooker') {
				echo '<img src="'.url('static/images/game_icon/snooker.png').'" alt="Snooker"'. $match->match_type . '">';
			};
			if ($match->match_type == 'Darts') {
				echo '<img src="'.url('static/images/game_icon/darts.png').'" alt="Darts"'. $match->match_type . '">';
			};
			if ($match->match_type == 'Table Tennis') {
				echo '<img src="' . url('static/images/game_icon/table-tennis.png') . '" alt="Table Tennis">';
			};
			if ($match->match_type == 'Beach Volley') {
				echo '<img src="' . url('static/images/game_icon/volleyball.png') . '" alt="Beach Volley">';
			};
			if ($match->match_type == 'Floor Ball') {
				echo '<img src="' . url('static/images/game_icon/floor-ball.png') . '" alt="Floor Ball">';
			};
			if ($match->match_type == 'Bandy') {
				echo '<img src="'.url('static/images/game_icon/bandy.png').'" alt="Bandy"'. $match->match_type . '">';
			};
			if ($match->match_type == 'Ludo') {
				echo '<img src="' . url('static/images/game_icon/ludo.png') . '" alt="Ludo">';
			};
			if ($match->match_type == 'Lucky Card') {
				echo '<img src="' . url('static/images/game_icon/lucky-card.png') . '" alt="Lucky Card">';
			};
			if ($match->match_type == 'Esports') {
				echo '<img src="' . url('static/images/game_icon/esports.png') . '" alt="Esports">';
			};
			if ($match->match_type == 'Volleyball') {
				echo '<img src="'.url('static/images/game_icon/volleyball-one.png').'" alt="Volleyball"'. $match->match_type . '">';
			};
					echo $match->team_one . ' vs ' . $match->team_two . ' || ' . $match->bet_statement . ' || ' . $date . ' || ' . $time . '</span> <span class="badge badge-secondary">' . $match->bets->count() . '</span> <span class="badge badge-info"> ' . $match->bets->sum('predict_amount') . '</span></p>';
               echo '<div class="table_list_item ds_2">
        <ul>
         <li>
         <button class="btn btn-primary" id="action_modal" data-id="' . $match->id . '"' . '>
           Action
         </button>
           </li>
            <li>
                <button class="btn btn-primary add-question" value="' . $match->id . '">
                  Add Question
                </button>
            </li>
            <li>';
            if ($match->is_hide_question == 0) {
                echo '<button class="btn btn-primary hide-match-question" data-id="' . $match->id . '"' . '>
                Hide Question
                </button>';
            } else {
                echo '<button class="btn btn-primary bg-danger show-match-question" data-id="' . $match->id . '"' . '>
                Show Question
                </button>';
            }
            echo '<li>
           <button class="btn btn-primary match-limit" data-id="' . $match->id . '"> Limit (' . $match->bet_limit . ')  </button>
            </li>';
            if ($match->is_active == 1) {
                echo  '<li>
              <a href="javascript:void(0)" class="match-deactive"' . 'data-id="' . $match->id . '"> Stop  </a>
            </li>';
            } else {
                echo  '<li>
           <a href="javascript:void(0)" class="match-active bg-danger"' . 'data-id="' . $match->id . '"> Active  </a>
          </li>';
            }
            if ($match->is_hide == 1) {
                echo  '<li>
            <a href="javascript:void(0)" class="match-show bg-danger"' . 'data-id="' . $match->id . '"> Show  </a>
            </li>';
            } else {
                echo  '<li>
             <a href="javascript:void(0)" class="match-hide"' . 'data-id="' . $match->id . '"> Hide  </a>
          </li>';
            }
            if ($match->is_area_hide == 1) {
                echo  '<li>
            <a href="javascript:void(0)" class="area-show bg-danger"' . 'data-id="' . $match->id . '"> Area Show  </a>
              </li>';
            } else {
                echo  '<li>
            <a href="javascript:void(0)" class="area-hide"' . 'data-id="' . $match->id . '"> Area Hide  </a>
             </li>';
            }

            echo '<li>
           <a href="javascript:void(0)" class="hide-from-panel bg-danger"' . 'data-id="' . $match->id . '"> Hide From Panel  </a>
           </li>
            <li>
           <a href="javascript:void(0)" class="to-live"' . 'data-id="' . $match->id . '"> To Live  </a>
           </li>
            </ul>
           </div></div>';

          if ($match->is_area_hide == 0) {
                if (!empty($match->questions) && $match->questions->count()) {
                    if ($match->is_hide_question == 0) {
                        foreach ($match->questions as $key => $question) {
                            if ($question->status != 'close') {
                                echo '<div class="live_match_tbl bg-dark">
                                <div class="table_list_item">
                                    <ul>
                                        <span class="c_black">' . $question->name . '</span>
                                        <li>
                                        <button class="btn btn-primary" id="question_action" data-id="' . $question->id . '"' . '>
                                        Action
                                      </button>
                                        </li>';
                                echo '<li>
                                        <button class="btn btn-primary question-limit" data-id="' . $question->id . '"> Limit (' . $question->bet_limit . ')  </a>
                                         </li>';
                                if ($question->is_active == 1) {
                                    echo  '<li>
                                  <a href="javascript:void(0)" class="question-deactive"' . 'data-id="' . $question->id . '"> Stop  </a>
                                 </li>';
                                } else {
                                    echo  '<li>
                                     <a href="javascript:void(0)" class="question-active bg-danger"' . 'data-id="' . $question->id . '"> Active  </a>
                                 </li>';
                                }
                                if ($question->is_hide == 1) {
                                    echo  '<li>
                              <a href="javascript:void(0)" class="question-show bg-danger"' . 'data-id="' . $question->id . '"> Show  </a>
                             </li>';
                                } else {
                                    echo  '<li>
                                 <a href="javascript:void(0)" class="question-hide"' . 'data-id="' . $question->id . '"> Hide  </a>
                             </li>';
                                }
                                if ($question->is_area_hide == 1) {
                                    echo  '<li>
                                  <a href="javascript:void(0)" class="question-area-show bg-danger"' . 'data-id="' . $question->id . '"> Area Show  </a>
                              </li>';
                                } else {
                                    echo  '<li>
                                     <a href="javascript:void(0)" class="question-area-hide"' . 'data-id="' . $question->id . '"> Area Hide  </a>
                                 </li>';
                                }
                                echo '<li class="bg2">
                                <span class="badge badge-secondary">' . $question->bets->count() . '</span> <span class="badge badge-info"> ' . $question->bets->sum('predict_amount') . '</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>';
                                if ($question->is_area_hide != '1') {

                                    if (!empty($question->options) && $question->options->count()) {
                                        echo '<div class="table-responsive">
                                       <table class="table table-bordered" id="example3">
                    <thead>
                        <tr>
                            <th scope="col">Answer</th>
                            <th scope="col">Bet Rate</th>
                            <th scope="col">Place Bet</th>
                            <th scope="col">Betting Amount</th>
                            <th scope="col">Return Amount</th>
                            <th scope="col">Action</th>
                            <th scope="col">Limit</th>
                        </tr>
                    </thead>
                    <tbody>';

                                        foreach ($question->options as $key => $option) {
                                            if ($option->status != 'close') {
                                                echo '<tr>
                               <th scope="row">
                                <div class="edit-option btn btn-primary" data-id="' . $option->id . '">' . $option->name . '
                                </div>
                                </th>
                                <td>
                                <div class="edit-option btn btn-primary" data-id="' . $option->id . '">' . number_format($option->bet_rate, 2) . '
                                </div>
                                </td>
                                <td>' . $option->bets->count() . '</td>
                                <td>' . $option->bets->sum('predict_amount') . '</td>
                                <td>' . $option->bets->sum('return_amount') . '</td>
                                <td>';
                                     if ($option->is_win == '0' && ($option->is_loss == '0')){
                                                    echo '<button type="button" id="option-win" class="btn btn-sm btn-primary mr-1" data-id="' . $option->id . '">Win</button>';
                                                }
                                    if ($option->is_win == '1') {
                                        echo '<button type="button" class="btn btn-sm btn-success mr-1">Wined</button>';
                                    }

                                    if ($option->is_loss == '1'){
                                                 echo '<button type="button" class="btn btn-sm btn-danger m-1">Loss</button>';
                                                }
                                                echo '<a class="btn btn-sm btn-primary m-1"  href="'.url('tib-admin/all-bets?option='.$option->id).'" id="user-action">Bets</a>';
                                                if ($option->status == 'active') {
                                                    echo '<a class="btn btn-sm btn-danger m-1"  href="javascript:void(0)" id="option-stop" data-id="' . $option->id . '">Stop</a>';
                                                } else {
                                                    echo '<a class="btn btn-sm btn-success m-1"  href="javascript:void(0)" id="option-run" data-id="' . $option->id . '">Run</a>';
                                                }
                                                if ($option->is_hide == '1') {
                                                    echo '<a class="btn btn-sm btn-info m-1"  href="javascript:void(0)" id="option-show" data-id="' . $option->id . '">Show</a>';
                                                } else {
                                                    echo '<a class="btn btn-sm btn-secondary m-1"  href="javascript:void(0)" id="option-hide" data-id="' . $option->id . '">Hide</a>';
                                                }

                                                echo '<a class="btn btn-sm btn-dark" href="javascript:void(0)" id="option-close" data-id="' . $option->id . '">Close</a>

                                </td>
                                <td>
                                <button class="btn btn-primary" id="option-limit" data-id="' . $option->id . '"> Limit (' . $option->bet_limit . ')  </button></td>
                            </tr>';
                                            }
                                        }

                                        echo  '<tfoot>
                                    <tr>
                                    <th> </th>
                                    <th> </th>
                                    <th> Total : ' . $question->bets->count() . '</th>
                                    <th> Total : ' . $question->bets->sum('predict_amount') . '</th>
                                    <th> Total : ' . $question->bets->sum('return_amount') . '</th>
                                    <th> <button type="button" class="btn btn-danger restart" data-id="' . $question->id . '">Restart</button> </th>
                                    </tr>
                                 </tfoot>
                                 </tbody>
                                 </table>
                                 </div>';
                                    }
                                }
                            }
                        }
                    }
                }
            }

        }
    }
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->status == 'upcoming') {
           $input['is_area_hide'] = '1';
        }
        $input['is_active'] = '0';
        $input['is_hide'] = '1';
        $match = Match::create($input);
        if ($match && $request->auto_question == 'yes') {
            $this->matchAutoQuestion($match->id, $match->match_type, $match->team_one, $match->team_two);
        }
        return response()->json($match);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $match = Match::find($id);
        return response()->json($match);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $match = Match::find($id);
        $match->fill($input)->save();
        return response()->json($match);
    }

    // Close Match

    public function closeMatch(Request $request, $id)
    {
        $match = Match::find($id);
        $match->update(['status' => 'close']);
        return response()->json($match);
    }


    // Hidden Live Match

    public function hiddenLiveMatch()
    {
        $matchs = Match::orderBy('date','DESC')->orderBy('time','ASC')->where('status','live')->get();
        if (!empty($matchs) && $matchs->count()) {
            foreach ($matchs as $key => $match) {
                if ($this->matchIsHide($match->id) == true) {
                $matchDate = $match->date;
                $date = date("d M Y", strtotime($matchDate));
                $matchTime = $match->time;
                $time  = date("g:i A", strtotime($matchTime));
                echo '<tr class="match-'.$match->id.'">
                <th scope="row">'. ++$key .'</th>';
                echo '<td>'. $match->team_one . ' vs '. $match->team_two . ' || ' . $match->bet_statement . ' || ' . $date . ' || ' . $time . '</td>';
                echo '<td><button type="button" class="btn btn-primary to-panel" data-id="'.$match->id .'">To Panel</button></td>
            </tr>';
            }
        }
        }
        else {
            echo '<tr>
            <th scope="row"></th><td>No match found!</td><td></td>
            </tr>';
        }
    }

        // Hidden Upcoming Match

        public function hiddenUpcomingMatch()
        {
            $matchs = Match::orderBy('date','DESC')->orderBy('time','ASC')->where('status','upcoming')->get();
            if (!empty($matchs) && $matchs->count()) {
            foreach ($matchs as $key => $match) {
                if ($this->matchIsHide($match->id) == true) {
                $matchDate = $match->date;
                $date = date("d M Y", strtotime($matchDate));
                $matchTime = $match->time;
                $time  = date("g:i A", strtotime($matchTime));
                echo '<tr class="match-'.$match->id.'" data-id="'.$match->id .'">
                <th scope="row">'. ++$key .'</th>';
                echo '<td>'. $match->team_one . ' vs '. $match->team_two . ' || ' . $match->bet_statement . ' || ' . $date . ' || ' . $time . '</td>';
                echo '<td><button type="button" class="btn btn-primary to-panel" data-id="'.$match->id .'">To Panel</button></td>
            </tr>';
            }
          }
        }
        else {
            echo '<tr>
            <th scope="row"></th><td>No match found!</td><td></td>
            </tr>';
        }
    }


    // Add To Panel

    public function addToPanel(Request $request, $id)
    {
        $match = HideFromPanel::where('match_id', $id)
        ->where('user_id', auth()->user()->id)
            ->first();
        if ($match) {
            $match->delete();
        }
        response()->json(['success' => 'Hide from panel']);
    }

    // Hide From Panel

    public function hideFromPanel(Request $request, $id)
    {
        $match = HideFromPanel::where('match_id', $id)
        ->where('user_id', auth()->user()->id)
            ->first();
        if (!$match) {
            HideFromPanel::Create([
                'match_id' => $id,
                'user_id' => auth()->user()->id
            ]);
        }
        response()->json(['success' => 'Hide from panel']);
    }

    // Match Area Hide

    public function areaHide(Request $request, $id)
    {
        $match = Match::find($id);
        $match->update(['is_area_hide' => 1]);
        return response()->json($match);
    }

    // Match Area Show

    public function areaShow(Request $request, $id)
    {
        $match = Match::find($id);
        $match->update(['is_area_hide' => 0]);
        return response()->json($match);
    }

      // Match Hide

      public function matchHide(Request $request, $id)
      {
          $match = Match::find($id);
          $match->update(['is_hide' => 1]);
          return response()->json($match);
      }

     // Match Show

     public function matchShow(Request $request, $id)
     {
         $match = Match::find($id);
         $match->update(['is_hide' => 0]);
         return response()->json($match);
     }

    // Hide match question

    public function hideMatchQuestion(Request $request, $id)
       {
           $match = Match::find($id);
           $match->update(['is_hide_question' => 1]);
           return response()->json($match);
       }


    // Show match question

    public function showMatchQuestion(Request $request, $id)
    {
        $match = Match::find($id);
        $match->update(['is_hide_question' => 0]);
        return response()->json($match);
    }

    // Match Active

    public function matchActive(Request $request, $id)
    {
        $match = Match::find($id);
        $match->update(['is_active' => 1]);
        return response()->json($match);
    }

    // Match Deactive

    public function matchDeactive(Request $request, $id)
    {
        $match = Match::find($id);
        $match->update(['is_active' => 0]);
        return response()->json($match);
    }

      // Close Match

      public function toLive(Request $request, $id)
      {
          $match = Match::find($id);
          $match->update(['status' => 'live']);
          return response()->json($match);
      }
}
