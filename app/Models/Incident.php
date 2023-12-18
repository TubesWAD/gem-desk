<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $table = "incidents";

    protected $fillable = [
        'insiden',
        'probabilitas',
        'kuadran_risiko',
        'tingkat_risiko',
    ];
}
