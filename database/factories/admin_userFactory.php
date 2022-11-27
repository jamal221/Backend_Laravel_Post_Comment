<?php

namespace Database\Factories;

use App\Models\admin_user;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin_users>
 */
class admin_userFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    protected $model=admin_user::class;
    public function definition()
    {
        return [
            'name' => fake()->firstName(),
            'surname'=>fake()->lastName(),
            'admin_level'=>random_int(0,2),
            'nickname'=>fake()->firstNameFemale(),
            'phone'=>fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'address'=>fake()->address(),
            'city'=>fake()->city(),
            'state'=>fake()->country(),
            'zipcode'=>fake()->postcode(),
            'remember_token' => Str::random(10),
            //
        ];
    }
}
