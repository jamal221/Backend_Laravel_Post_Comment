<?php

namespace Database\Factories;

use App\Models\reg_user;
use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;
use function Spatie\Ignition\Config\toArray;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\login_user>
 */
class login_userFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_id_reg=reg_user::pluck('id')->toArray();
        $sur_user=reg_user::pluck('surname')->toArray();
        $name_user=reg_user::pluck('name')->toArray();
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
