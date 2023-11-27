<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAccommodation extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'accommodations';

    protected $fillable = [
        'property_id',
        'collector_created',
        'collector_updated',
        'arrivalDate',
        'roomNumber',
        'ageOfGuest',
        'guestExempted',
        'firstName',
        'lastName',
        'numberOfNights',
        'color',
    ];

    public function collector()
    {
        return $this->belongsTo(Collector::class, 'collector_created');
    }

    public function adminProperty()
    {
        return $this->belongsTo(AdminProperty::class);
    }
}
