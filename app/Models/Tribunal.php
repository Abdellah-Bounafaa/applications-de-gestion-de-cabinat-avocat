<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tribunal extends Model
{
    public $table = 'tribunal';
    protected $primaryKey = 'ID_TRIBUNAL';

    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;

    public function ville()
    {
        return $this->belongsTo(Ville::class, 'ID_VILLE');
    }
    public function type_tribunal()
    {
        return $this->belongsTo(TypeTribunal::class, 'ID_TTRIBUNAL', 'ID_TRIBUNAL');
    }
}
