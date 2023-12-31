<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public $table = 'services';

    protected $fillable = [
        'name',
        'service_categories',
        'description',
        'cost',
        'availability',
        'hours',
        'owned',
        'files',
    ];
}