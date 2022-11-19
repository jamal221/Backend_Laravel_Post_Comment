<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $table='posts';
    public $timestamps=true;
    protected $fillable=[
        'UserID_Set_Post',
        'title',
        'body'
    ];
}
