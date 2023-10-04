<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Cna extends Model
{
    public $table = 'cna';
    protected $primaryKey = 'ID_CNA';
    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
