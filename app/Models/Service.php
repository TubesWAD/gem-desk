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
        'quantity',
        'availability',
        'hours',
        'id_organization',
        'files',
        'id_product',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product'); // Foreign key: id_products
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'id_organization'); // Foreign key: id_organization
    }
}
