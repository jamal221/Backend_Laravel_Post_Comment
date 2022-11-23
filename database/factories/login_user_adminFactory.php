<?php

namespace Database\Factories;

use App\Models\admin_user;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\login_user_admin>
 */
class login_user_adminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_id_reg=admin_user::pluck('id')->toArray();
        $sur_user=admin_user::pluck('surname')->toArray();
        $name_user=admin_user::pluck('name')->toArray();
        return [
            //
            'user_id'=>$user_id_reg,
            'username'=>$sur_user,
            'password'=>Number::random(6),
            'created_at'=>now(),
            'updated_at'=>now()
        ];
    }
}
