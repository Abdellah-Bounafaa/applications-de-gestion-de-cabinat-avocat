<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Huissier extends Model
{
    public $table = 'huissier';
    protected $primaryKey = 'ID_HUISSIER';
    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
