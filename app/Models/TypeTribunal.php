<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeTribunal extends Model
{
    public $table = 'type_tribunal';
    protected $primaryKey = 'ID_TRIBUNAL';

    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;

    public function tribunal()
    {
        return $this->hasMany(Tribunal::class, 'ID_TRIBUNAL', 'ID_TTRIBUNAL');
    }
}
