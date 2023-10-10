<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;
    public $table = 'expert';
    protected $primaryKey = 'ID_EXPERT';

    //Laravel Unknown Column 'updated_at'

    public $timestamps = false;
}
