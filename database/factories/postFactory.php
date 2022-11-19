<?php

namespace Database\Factories;

use App\Models\login_user;
use App\Models\reg_user;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
//        $user_id_reg=login_user::pluck('user_id')->toArray();

        return [
            'UserID_Set_Post'=>rand(1,800),
            'title'=>fake()->jobTitle(),
            'body'=>str_repeat(fake()->realText(200),'2')

            //
        ];
    }
}
