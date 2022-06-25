<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
     protected $table = 'tit_withdraws';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'method',
        'type',
        'amount', 
        'account',
        'note',
        'status',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
