<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
     protected $table = 'tit_questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'match_id',
        'bet_limit',
        'is_hide',
        'is_area_hide',
        'is_active',
        'status',
    ];

   public function match(){
   	return $this->belongsTo(Match::class);
   	 }

   public function options()
     {
    return $this->hasMany(Option::class);
     }

     public function bets()
     {
    return $this->hasMany(Bet::class);
     }

}
