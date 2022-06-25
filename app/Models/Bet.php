<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    protected $table = 'tit_bets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'option_id', 
        'user_id', 
        'match_id', 
        'question_id',
        'club_id', 
        'sponsor_id',
        'predict_amount',
        'return_amount',
        'bet_rate',
        'club_commission',
        'sponsor_commission',
        'option_name',
        'match_name',
        'question_name',
        'status',
    ];

     public function option(){
    	return $this->belongsTo(Option::class);
    }

    public function match(){
    	return $this->belongsTo(Match::class);
    }

    public function question(){
    	return $this->belongsTo(Question::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
