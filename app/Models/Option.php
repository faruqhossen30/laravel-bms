<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
     protected $table = 'tit_options';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'question_id',
        'match_id',
        'bet_rate',
        'bet_limit',
        'is_hide',
        'status',
        'is_win',
        'is_loss',
    ];
     public function match(){
        return $this->belongsTo(Match::class);
         }

     public function question(){
    	return $this->belongsTo(Question::class);
    }

    public function bets()
    {
   return $this->hasMany(Bet::class);
    }


}
