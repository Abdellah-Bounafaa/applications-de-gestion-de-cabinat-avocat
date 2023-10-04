<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currateur extends Model
{
    public $table = 'currateur';
    protected $primaryKey = 'ID_CURRATEUR';
    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
