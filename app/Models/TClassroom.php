<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TClassroom extends Model
{
    protected $table = 'tclassrooms';
    protected $primaryKey = 'idClassroom';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;
}
