<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $table = 'tit_matchs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_one',
        'team_two',
        'date',
        'time',
        'match_type',
        'bet_statement',
        'bet_limit',
        'is_area_hide',
        'is_default',
        'is_hide_panel',
        'is_hide',
        'is_hide_question',
        'is_active',
        'status',
    ];

    public function questions()
     {
    return $this->hasMany(Question::class);
     }

     public function bets()
     {
    return $this->hasMany(Bet::class);
     }

}
