<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\reg_user>
 */
class reg_userFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'name' => fake()->firstName(),
            'surname'=>fake()->lastName(),
            'nickname'=>fake()->firstNameFemale(),
            'phone'=>fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'address'=>fake()->address(),
            'city'=>fake()->city(),
            'state'=>fake()->country(),
            'zipcode'=>fake()->postcode(),
            'remember_token' => Str::random(10),
            'moderate_user'=>random_int(0,1),
            //
        ];
    }
}
