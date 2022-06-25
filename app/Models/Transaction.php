<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'tit_transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'debit',
        'credit',
        'description',
        'balance'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

}
