<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $table = 'tit_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'username',
        'sponsor_id',
        'club_id',
        'balance',
        'is_admin',
        'is_club',
        'club_owner',
        'club_mobile',
        'club_address',
        'club_commission',
        'status',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function club()
    {
        return $this->belongsTo(User::class, 'club_id');
    }

    public function sponsor()
    {
        return $this->belongsTo(User::class, 'sponsor_id');
    }

    public function clubUsers()
    {
        return $this->hasMany(User::class, 'club_id');
    }

    public function sponsors()
    {
        return $this->hasMany(User::class, 'sponsor_id');
    }
}
