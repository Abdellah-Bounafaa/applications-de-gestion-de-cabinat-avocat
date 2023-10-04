<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Requete extends Model
{
    public $table = 'requete';
    protected $primaryKey = 'ID_REQUETE';
    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
