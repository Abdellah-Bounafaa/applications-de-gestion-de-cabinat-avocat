<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public $table = 'document';
    protected $primaryKey = 'ID_DOCUMENT';
    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
