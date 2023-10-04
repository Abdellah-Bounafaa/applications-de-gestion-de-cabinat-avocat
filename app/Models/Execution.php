<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Execution extends Model
{
    public $table = 'execution';
    protected $primaryKey = 'ID_EXECUTION';
    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
