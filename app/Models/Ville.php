<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    public $table = 'ville';
    protected $primaryKey = 'ID_VILLE';
    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
