<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'username',
        'accepted',
        'position',
        'email',
        'email_verified_at',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function accommodations()
    {
        return $this->hasMany(Accommodation::class);
    }

    public function declaration()
    {
        return $this->hasMany(Declaration::class);
    }

    public function userHasRole($role_name)
    {
        foreach ($this->roles as $role) {
            if (Str::lower($role_name) == Str::lower($role->name))
                return true;
        }

        return false;
    }
}
