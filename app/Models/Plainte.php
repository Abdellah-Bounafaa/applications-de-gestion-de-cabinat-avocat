<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plainte extends Model
{
    public $table = 'plainte';
    protected $primaryKey = 'ID_PLAINTE';
    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
