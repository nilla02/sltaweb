<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectorRole extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'collector_role';

    public function Collector()
    {
        return $this->belongsToMany(Collector::class, 'collector_role', 'collector_roles_id', 'collector_id');
    }
}
