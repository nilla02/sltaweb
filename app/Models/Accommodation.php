<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'user_created',
        'user_updated',
        'arrivalDate',
        'roomNumber',
        'ageOfGuest',
        'guestExempted',
        'firstName',
        'lastName',
        'numberOfNights',
        'color',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_created');
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
