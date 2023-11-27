<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'property_id',
        'declaration_id',
        'payment',
        'payment_type',
        'payment_sub_type',
        'payment_url',
        'payment_back_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function declaration()
    {
        return $this->belongsTo(Declaration::class);
    }
}
