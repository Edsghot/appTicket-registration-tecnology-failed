<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TAdmin extends Model
{
    protected $table = 'tadmins';
    protected $primaryKey = 'idAdmin';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;
}
