<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutoOption extends Model
{
    protected $table = 'tit_auto_options';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'auto_question_id',
        'name',
        'bet_rate',
        'status'
    ];
}
