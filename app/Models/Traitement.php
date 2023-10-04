<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Traitement extends Model
{
    public $table = 'traitement';
    protected $primaryKey = 'ID_PROCEDURE';

    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
