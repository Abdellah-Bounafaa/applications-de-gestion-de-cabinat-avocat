<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    public $table = 'dossier';
    protected $primaryKey = 'ID_DOSSIER';
    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
