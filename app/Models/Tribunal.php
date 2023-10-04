<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tribunal extends Model
{
    public $table = 'tribunal';
    protected $primaryKey = 'ID_TRIBUNAL';

    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
