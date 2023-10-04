<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    public $table = 'etape';
    protected $primaryKey = 'ID_ETAPE';
    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
