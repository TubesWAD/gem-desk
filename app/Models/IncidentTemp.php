<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IncidentTemp extends Model
{
    use HasFactory;

    protected $fillable = [
      'incident','service_id', 'probability', 'risk_quadrant', 'risk_level'
    ];

//    public function service() : BelongsTo
//    {
//        return $this->belongsTo(Service::class);
//    }
}
