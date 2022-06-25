<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HideFromPanel extends Model
{
    protected $table = 'tit_hide_from_panels';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'match_id',
        'user_id',
    ];
}
