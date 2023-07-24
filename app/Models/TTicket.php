<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TTicket extends Model
{
    protected $table = 'ttickets';
    protected $primaryKey = 'idTicket';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;
}
