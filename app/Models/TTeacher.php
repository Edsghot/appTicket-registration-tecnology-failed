<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TTeacher extends Model
{
    protected $table = 'tteachers';
    protected $primaryKey = 'idteacher';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;
}
