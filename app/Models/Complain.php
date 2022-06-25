<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    protected $table = 'tit_complains';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'contact_number',
        'message',
        'status'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
