<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AutoQuestion;
use App\Models\AutoOption;

class AutoQuestionController extends Controller
{   

    public function __construct()
    {   $this->middleware('auth');
        $this->middleware('permission:AutoQuestion');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
         //Filter
         $filters = [
             'question' => $request->question,
             'game'    => $request->game,
             'status'    => $request->status
         ];
 
         //Questions
         $questions = AutoQuestion::orderBy('id', 'DESC')
         ->where(function ($query) use ($filters) {
             if ($filters['question']) {
                 $query->where('name', 'like', '%'.$filters['question'].'%');
             }
             if ($filters['game'] && $filters['game'] != 'All') {
                 $query->where('match_type', '=', $filters['game']);
             }
             if($filters['status'] && $filters['status'] != 'All') {
                 $query->where('status', '=', $filters['status']);
             }
         })->paginate(100);
 
       return view('admin.auto-question.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.auto-question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'match_type' => 'required',
            'status' => 'required',

            'option.*.name' => 'required',
            'option.*.bet_rate' => 'required'
        ]);

        $question = AutoQuestion::create([
            'name' => $request->name,
            'match_type' => $request->match_type,
            'status' => $request->status
        ]);

        foreach ($request->option as $key => $value) {
            AutoOption::create([
                'auto_question_id' => $question->id,
                'name' => $value['name'],
                'bet_rate' => $value['bet_rate'],
                'status' => $value['status']
            ]);
        }

        return redirect()->route('auto-questions.index')
        ->with('success','Auto question add successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = AutoQuestion::find($id);
        return view('admin.auto-question.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = AutoQuestion::find($id);
        return view('admin.auto-question.edit',compact('question'));
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
        $this->validate($request, [
            'name' => 'required',
            'match_type' => 'required',
            'status' => 'required',

            'option.*.name' => 'required',
            'option.*.bet_rate' => 'required'
        ]);

        $question = AutoQuestion::find($id);
        $question->name = $request->name;
        $question->match_type = $request->match_type;
        $question->status = $request->status;
        $question->save();
        if (!empty($question->options) && $question->options->count() ) {
            $question->options()->delete();
        }
        foreach ($request->option as $key => $value) {
            AutoOption::create([
                'auto_question_id' => $question->id,
                'name' => $value['name'],
                'bet_rate' => $value['bet_rate'],
                'status' => $value['status']
            ]);
        }

        return redirect()->route('auto-questions.index')
        ->with('success','Auto question update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = AutoQuestion::find($id);
        if (!empty($question->options) && $question->options->count() ) {
            $question->options()->delete();
        }
        $question->delete();

        return response()->json([
            'success' => 'yes',
            'message' => 'Auto Question Delete Successfully!',
        ]);
    }
}
