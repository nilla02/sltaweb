<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminDeclaration extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'declarations';

    protected $fillable = [
        'collector_id',
        'property_id',
        'date',
        'payment',
        'made_payment',
    ];

    public function Collector()
    {
        return $this->belongsTo(Collector::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
