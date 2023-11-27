<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPayment extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'payments';

    protected $fillable = [
        'collector_id',
        'property_id',
        'declaration_id',
        'payment',
        'payment_type',
        'payment_sub_type',
        'payment_url',
        'payment_back_url',
    ];

    public function collector()
    {
        return $this->belongsTo(Collector::class);
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
