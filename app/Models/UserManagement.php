<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserManagement extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'username',
        'password',
        'employee_id',
        'department_name',
        'roles',
        'mobile',
        'description',
        'email'
    ];
}
