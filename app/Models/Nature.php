<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nature extends Model
{
    public $table = 'nature';
    protected $primaryKey = 'ID_NATURE';

    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
