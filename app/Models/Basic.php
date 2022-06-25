<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basic extends Model
{
    protected $table = 'tit_basic';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'site_name',
        'site_title',
        'currency',
        'currency_code',
        'currency_symbol',
        'club_commission',
        'sponsor_commission',
        'notice',
        'copyright',
    ];
}
