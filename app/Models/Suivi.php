<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Suivi extends Model
{
    public $table = 'suivi';
    protected $primaryKey = 'ID_PROCEDURE';
    protected $secondaryKey = 'ID_ETAPE';
    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
