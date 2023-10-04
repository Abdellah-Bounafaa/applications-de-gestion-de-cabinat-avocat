<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Jugement extends Model
{
    public $table = 'jugement';
    protected $primaryKey = 'ID_JUGEMENT';
    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
