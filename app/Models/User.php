<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    public $table = 'utilisateurs';
    protected $primaryKey = 'CIN';
    protected $keyType = 'string';
    public $incrementing = false;

    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
    // public function requete()
    // {
    //     return $this->hasMany(Requete::class, "CIN", 'CIN');
    // }
}
