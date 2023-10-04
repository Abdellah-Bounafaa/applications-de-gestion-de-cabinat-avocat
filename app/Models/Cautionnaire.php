<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cautionnaire extends Model
{
    public $table = 'cautionnaire';
    protected $primaryKey = 'ID_CAUTIONNAIRE';
    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
