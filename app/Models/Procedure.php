<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    public $table = 'procedures';
    protected $primaryKey = 'ID_PROCEDURE';

    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
