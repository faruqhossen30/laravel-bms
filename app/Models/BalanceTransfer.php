<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalanceTransfer extends Model
{
    protected $table = 'tit_balance_transfers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'to_username',
        'amount',
        'note'
    ];

     public function toUser(){
    	return $this->belongsTo(User::class, 'username', 'to_username');
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
