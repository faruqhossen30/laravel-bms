<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = 'tit_deposits';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'method',
        'amount',
        'from_account',
        'to_account',
        'transaction',
        'status',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

}
