<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reg_user extends Model
{
    use HasFactory;
    protected $table='reg_users';
    protected $fillable=[
        'name',
        'surname',
        'phone',
        'email',
        'address',
        'city'
    ];
}
