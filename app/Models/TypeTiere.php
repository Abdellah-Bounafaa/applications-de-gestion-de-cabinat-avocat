<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class TypeTiere extends Model
{
    public $table = 'type_tiere';
    protected $primaryKey = 'ID_TYPET';

    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
