<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BmiRecord extends Model
{
   protected $fillable = [
    'berat',
    'tinggi',
    'umur',
    'gender',
    'bmi',
    'kategori'
];

// opsional (kalau sebelumnya kamu matikan timestamps)
// public $timestamps = false;

}
