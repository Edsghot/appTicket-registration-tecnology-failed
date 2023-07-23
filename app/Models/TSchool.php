<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSchool extends Model
{
    protected $table = 'tschools';
    protected $primaryKey = 'idSchool';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;
}
