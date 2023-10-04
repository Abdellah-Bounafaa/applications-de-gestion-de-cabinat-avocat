<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class TypeDossier extends Model
{
    public $table = 'type_dossier';
    protected $primaryKey = 'ID_TYPEDOSSIER';

    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
