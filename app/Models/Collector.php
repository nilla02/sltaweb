<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Collector extends Model
{
    use HasFactory, Notifiable;

    protected $connection = 'mysql2'; //pass the connection name here

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function properties()
    {
        return $this->belongsToMany(AdminProperty::class, 'collector_property', 'collector_id', 'property_id');
    }

    public function declaration()
    {
        return $this->hasMany(AdminDeclaration::class, 'declaration_id', 'id');
    }

    public function Roles()
    {
        return $this->belongsToMany(CollectorRole::class, 'collector_role', 'collector_id', 'collector_roles_id');
    }
}
