<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectorProperty extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'collector_property';
}
