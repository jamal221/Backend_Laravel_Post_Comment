<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class login_user extends Model
{
    use HasFactory;
    protected $table='login_users';
    public $timestamps=true;
    protected $fillable=[
        'username',
        'password'
    ];
    public function post()
    {
        //UserID_Set_Post is field in posts that related to id in login_user table
        return $this->hasMany(Post::class, 'UserID_Set_Post','id');

    }

}
