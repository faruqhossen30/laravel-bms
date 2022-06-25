<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alart extends Model
{
    protected $table = 'tit_alarts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'is_viewed',
        'is_admin_alart',
        'url',
        'is_user_alart',
        'status',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
