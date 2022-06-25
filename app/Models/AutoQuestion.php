<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutoQuestion extends Model
{
    protected $table = 'tit_auto_questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'match_type',
        'status'
    ];

    public function options()
    {
        return $this->hasMany(AutoOption::class);
    }
}
