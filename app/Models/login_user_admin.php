<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class login_user_admin extends Model
{
    use HasFactory;
    protected $table="login_user_admins";
    public $timestamps=true;
    protected $fillable=[
        'username',
        'password'
    ];
}
