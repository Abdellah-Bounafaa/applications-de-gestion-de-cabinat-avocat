<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    public $table = 'ville';
    protected $primaryKey = 'ID_VILLE';
    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;

    public function tribunal()
    {
        return $this->hasMany(Tribunal::class, "ID_VILLE", "ID_VILLE");
    }
    // public function expert()
    // {
    //     return $this->hasMany(Expert::class, 'ID_VILLE', 'ID_VILLE');
    // }
    public function expert()
    {
        return $this->hasMany(Expert::class, 'ID_VILLE', 'ID_VILLE');
    }
    public function huissier()
    {
        return $this->hasMany(Huissier::class, 'ID_VILLE', 'ID_VILLE');
    }
}
