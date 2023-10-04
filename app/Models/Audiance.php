<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audiance extends Model
{
    public $table = 'audiance';
    protected $primaryKey = 'ID_AUDIANCE';
    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
