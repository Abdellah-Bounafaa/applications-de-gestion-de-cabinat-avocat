<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $table = 'notification';
    protected $primaryKey = 'ID_NOTIFICATION';
    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
