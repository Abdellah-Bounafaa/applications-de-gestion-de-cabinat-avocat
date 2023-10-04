<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    public $table = 'clients';
    protected $primaryKey = 'ID_CLIENT';

    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
