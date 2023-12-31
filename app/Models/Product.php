<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function asset(): HasOne
    {
        return $this->hasOne(Asset::class);
    }

    protected $fillable = ['name', 'organization_name', 'product_type', 'manufacturer', 'cost', 'description'];
}
