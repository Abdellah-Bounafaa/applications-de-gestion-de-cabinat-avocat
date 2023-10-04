<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeTribunal extends Model
{
    public $table = 'type_tribunal';
    protected $primaryKey = 'ID_TRIBUNAL';

    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
