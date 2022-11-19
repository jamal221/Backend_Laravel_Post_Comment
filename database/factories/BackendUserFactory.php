<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\reg_user;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\reg_user>
 */
class BackendUserFactory extends Factory
{
    /**
     * Define the model's default state.
     * Configure the model factory.
     * @return $this
     * @return array<string, mixed>
     */
    public function configure()
    {
        return $this->afterMaking(function (reg_user $user) {
            //
        })->afterCreating(function (reg_user $user) {
            //
        });
    }
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
            //
        ];
    }
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
