<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Match;
use App\Models\Alart;

class DeleteDataController extends Controller
{   
    public function __construct(){
        set_time_limit(0);
    }
    
    //Delete Match Data
    public function match_data_delete()
    {
        $matches = Match::whereYear('created_at', date('Y', strtotime('-1 year')))->get();
        foreach ($matches as $match) {
            foreach ($match->questions as $question) {
                foreach ($question->options as $option) {
                    $option->delete();
                }
                $question->delete();
            }
            $match->bets()->delete();
            $match->delete();
        }
        echo 'Match Deleted';
    }
}
