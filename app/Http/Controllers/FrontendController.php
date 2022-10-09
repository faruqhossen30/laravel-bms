<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match;
use App\Models\Option;
use App\Models\Gateway;
use Brian2694\Toastr\Facades\Toastr;

class FrontendController extends Controller
{

	public function index()
	{
		$live_matchs = Match::orderBy('date','ASC')->orderBy('time','ASC')
		->where('status','live')->where('is_hide',0)->get();
		$upcoming_matchs = Match::orderBy('date','ASC')->orderBy('time','ASC')
		->where('status','upcoming')->where('is_hide',0)->get();
		// return view('index', compact('live_matchs', 'upcoming_matchs'));
        // return $live_matchs;
        return view('homepage', compact('live_matchs', 'upcoming_matchs'));
	}

	public function sport(Request $request, $sport)
	{
        try {
            $live_matchs = Match::where('match_type', $sport)->orderBy('date','ASC')->orderBy('time','ASC')
            ->where('status','live')->where('is_hide',0)->get();

            // return $live_matchs;

            $upcoming_matchs = Match::where('match_type', $sport)->orderBy('date','ASC')->orderBy('time','ASC')
            ->where('status','upcoming')->where('is_hide',0)->get();
            // return view('index', compact('live_matchs', 'upcoming_matchs'));
            return view('homepage', compact('live_matchs', 'upcoming_matchs'));

          } catch (\Exception $e) {

              return abort(404);
          }


	}

	public function show_match_options($id)
	{
		$match = Match::findOrFail($id);
		$html = '';
		if(!empty($match->questions) && $match->questions->count()){
		$html .='<div id="collapse'.$match->id.'" class="collapse show" aria-labelledby="heading'.$match->id.'" data-parent="#accordionExample">';
        foreach($match->questions as $key => $question){
        if($question->status == 'active' && $question->is_hide == '0'){
        $html .='<div class="card-body">';
		$html .='<div class="panel-heading second-lebal">';
		$html .='<h4 style="cursor: pointer" class="panel-title-2" role="button" data-toggle="collapse" href="#one'.$question->id.'" aria-expanded="true" aria-controls="#one'.$question->id.'">';
        $html .=$question->name;
		$html .='</h4>';
		$html .='</div>';
		$html .='<div id="one'.$question->id.'" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="">';
        $html .='<div class="panel-body">';
		$html .='<div class="container">';
		$html .='<div class="row">';
		if(!empty($question->options) && $match->questions->count()){
		foreach($question->options as $key => $option){
		if($option->status == 'active' && $option->is_hide == '0'){
			$bet_info = '';
			if ($match->is_active == '1' && $question->is_active == '1') {
				$bet_info = 'betInfo';
			}
			$html .='<div class="col btn btn-default data-show buttonrate">';
			$html .='<div class="rate_s '.$bet_info.'" data-id="'.$option->id.'">';
			$html .='<span class="option">'.$option->name.'<br/>';
			$html .='<span class="option-ratio"><b>';
			$html .=number_format($option->bet_rate, 2);
			$html .='</b></span>';
			$html .='<br/><br/>';
			$html .='</span>';
			$html .='</div>';
			$html .='</div>';
		 }
	    }
        }
		$html .='</div>';
		$html .='</div>';
		$html .='</div>';
		$html .='</div>';
		$html .='</div>';
	 }
     }
	 $html .='</div>';
    }

	echo $html;
}

	public function show_option($id)
    {
    	$option = Option::find($id);
		$match_date = $option->match->date;
		$date = date("d M Y", strtotime($match_date));
		$match_time = $option->match->time;
		$time  = date("g:i A", strtotime($match_time));
        // $info =[
		// 	'option' => $option,
        //     'question' => $option->question,
		// 	'match' => $option->match,
		// 	'match_details' => $option->match->team_one .' vs '. $option->match->team_two . ' || '
		// 	. $option->match->bet_statement . ' || ' .  $date. ',' . $time ,
		// ];

			$match_details = $option->match->team_one .' vs '. $option->match->team_two . ' || '
			. $option->match->bet_statement . ' || ' .  $date. ',' . $time;


            // return $option;


        return $data = view('inc.betmodal-body', compact('option', 'match_details'))->render();
        // return response()->json($info);
    }

}
