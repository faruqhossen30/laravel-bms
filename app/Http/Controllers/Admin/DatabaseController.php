<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Match;
use App\Models\Question;
use App\Models\Option;
use App\Models\Bet;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{

   public function __construct()
   {
      $this->middleware('auth');
      $this->middleware('permission:Database');
   }

   // Close Match
   public function match_close_index(Request $request)
   {  
      //Filter
      $filters = [
         'date' => $request->date,
         'team_one'    => $request->team_one,
         'team_two'    => $request->team_two,
         'bet_statement'    => $request->bet_statement
     ];

     //Matchs
     $matchs =  Match::orderBy('id','DESC')
     ->where('status', 'close')
     ->where(function ($query) use ($filters) {
         if ($filters['date']) {
             $query->whereDate('date', '=', $filters['date']);
         }
         if ($filters['team_one']) {
            $query->where('team_one', 'like', '%'.$filters['team_one'].'%');
         }
         if ($filters['team_two']) {
            $query->where('team_two', 'like', '%'.$filters['team_two'].'%');
         }
         if ($filters['bet_statement']) {
            $query->where('bet_statement', 'like', '%'.$filters['bet_statement'].'%');
         }
     })->paginate(100);

      return view('admin.database.match_close_index', compact('matchs'));
   }

   // Match To Live
   public function match_to_live($id)
   {
     $match = Match::find($id);
     $match->update(['status' => 'live']);

     return response()->json([
      'success' => 'yes',
      'message' => 'Match Close To Live Successfully!',
  ]);
   }

    // Match To Upcoming
    public function match_to_upcoming($id)
    {
      $match = Match::find($id);
      $match->update(['status' => 'upcoming']);

      return response()->json([
         'success' => 'yes',
         'message' => 'Match Close To Upcoming Successfully!',
     ]);
    }

    // Close Questions
    public function question_close_index(Request $request)
    {
    
    //Filter
    $filters = [
        'date' => $request->date,
        'question' => $request->question,
        'team_one'    => $request->team_one,
        'team_two'    => $request->team_two,
        'bet_statement'    => $request->bet_statement
    ];

    //Questions
    $questions = Question::orderBy('id','DESC')
    ->where('status', 'close')
    ->where(function ($query) use ($filters) {
        if ($filters['date']) {
            $query->whereHas('match', function ($match) use ($filters){
                $match->whereDate('date', '=', $filters['date']);
            });
        }
        if ($filters['question']) {
            $query->where('name', 'like', '%'.$filters['question'].'%');
         }
        if ($filters['team_one']) {
            $query->whereHas('match', function ($match) use ($filters){
                $match->where('team_one', 'like', '%'.$filters['team_one'].'%');
            });
         }
         if ($filters['team_two']) {
            $query->whereHas('match', function ($match) use ($filters){
                $match->where('team_two', 'like', '%'.$filters['team_two'].'%');
            });
         }
         if ($filters['bet_statement']) {
            $query->whereHas('match', function ($match) use ($filters){
                $match->where('bet_statement', 'like', '%'.$filters['bet_statement'].'%');
            });
         }
    })->paginate(100);
        
    return view('admin.database.question_close_index', compact('questions'));
    }
  
    // Question To Live
    public function question_to_live($id)
    {
        $question = Question::find($id);
        $question->update(['status' => 'active']);
        
        if ($question->match->status == 'close') {
            $question->match->update(['status' => 'live']);
        }

        return response()->json([
            'success' => 'yes',
            'message' => 'Question Close To Live Successfully!',
        ]);
    }
   
    // Question To Upcoming
    public function question_to_upcoming($id)
    {
        $question = Question::find($id);
        $question->update(['status' => 'deactive']);
        
        if ($question->match->status == 'close') {
            $question->match->update(['status' => 'upcoming']);
        }

        return response()->json([
            'success' => 'yes',
            'message' => 'Question Close To Live Successfully!',
        ]);
    }

    // Close Option
    public function option_close_index(Request $request){ 
        
        //Filter
        $filters = [
        'date' => $request->date,
        'option' => $request->option,
        'question' => $request->question,
        'team_one'    => $request->team_one,
        'team_two'    => $request->team_two,
        'bet_statement'    => $request->bet_statement
        ];
        
        //Options
        $options = Option::orderBy('id','DESC')
        ->where('status', 'close')
        ->where(function ($query) use ($filters) {
        if ($filters['date']) {
            $query->whereHas('match', function ($match) use ($filters){
                $match->whereDate('date', '=', $filters['date']);
            });
        }
        if ($filters['option']) {
            $query->where('name', 'like', '%'.$filters['option'].'%');
         }
         if ($filters['question']) {
            $query->whereHas('question', function ($question) use ($filters){
                $question->where('name', 'like', '%'.$filters['question'].'%');
            });
         }
        if ($filters['team_one']) {
            $query->whereHas('match', function ($match) use ($filters){
                $match->where('team_one', 'like', '%'.$filters['team_one'].'%');
            });
         }
         if ($filters['team_two']) {
            $query->whereHas('match', function ($match) use ($filters){
                $match->where('team_two', 'like', '%'.$filters['team_two'].'%');
            });
         }
         if ($filters['bet_statement']) {
            $query->whereHas('match', function ($match) use ($filters){
                $match->where('bet_statement', 'like', '%'.$filters['bet_statement'].'%');
            });
         }
        })->paginate(100);

       return view('admin.database.option_close_index', compact('options'));
  }

    //Option To Live
    public function option_to_live($id)
    {
      $option = Option::find($id);
      $option->update(['status' => 'active']);

      if ($option->match->status == 'close') {
         $option->match->update(['status' => 'live']);
      }

      if ($option->question->status == 'close') {
          $option->question->update(['status' => 'active']);
       }

       return response()->json([
        'success' => 'yes',
        'message' => 'Option Close To Live Successfully!',
    ]);
     }

      //Option To Upcoming
      public function option_to_upcoming($id)
      {
        $option = Option::find($id);
        $option->update(['status' => 'active']);
          
        if ($option->match->status == 'close') {
              $option->match->update(['status' => 'upcoming']);
            }
        if ($option->question->status == 'close') {
          $option->question->update(['status' => 'active']);
        }

        return response()->json([
            'success' => 'yes',
            'message' => 'Option Close To Upcoming Successfully!',
        ]);
    }
}
