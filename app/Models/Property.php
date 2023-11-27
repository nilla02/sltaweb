<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tradeName',
        'vatTaxpayerAccount',
        'Location',
        'mailingAddress',
        'noOfRooms',
        'typeOfProperty',
        'ownerName',
        'ownerPosition',
        'ownerEmail',
        'managerName',
        'managerPosition',
        'managerEmail',
        'accountantName',
        'accountantPosition',
        'accountantEmail',
        'primaryContactName',
        'primaryContactPosition',
        'primaryContactEmail',
        'applicableClassAndRate',
        'vat',
        'coicogs',
        'business',
        'government_id',
        'signed',
        'message',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function accommodations()
    {
        return $this->hasMany(Accommodation::class);
    }

    public function declaration()
    {
        return $this->hasMany(Declaration::class);
    }
}
