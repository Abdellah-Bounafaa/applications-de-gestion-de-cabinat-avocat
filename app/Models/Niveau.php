<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    public $table = 'niveau';
    protected $primaryKey = 'ID_NIVEAU';

    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
