<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description','user_id', 'ticket_type','files','status','is_resolved',
    ];

    public function solutions() : HasMany
    {
        return $this->hasMany(Solution::class, 'ticket_id');
    }
}
