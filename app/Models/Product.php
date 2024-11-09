<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    public function asset(): HasOne
    {
        return $this->hasOne(Product::class);
    }

    protected $fillable = ['name', 'organization_name', 'product_type', 'manufacturer', 'cost', 'description'];

    public function services()
    {
        return $this->hasMany(Service::class, 'id_product'); // Foreign key: id_product
    }
}
