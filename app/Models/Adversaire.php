<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adversaire extends Model
{
    public $table = 'adversaires';
    protected $primaryKey = 'ID_ADVERSAIRE';
    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
