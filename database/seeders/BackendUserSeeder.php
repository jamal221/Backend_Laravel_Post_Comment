<?php

namespace Database\Seeders;

use App\Models\reg_user;
use Illuminate\Database\Seeder;
class BackendUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function run()
    {
        //
//        reg_user::truncate();//this function delete data in table
//        $seeded_user=(BackendUserFactory::class,3);
//        $factory=BackendUserFactory::class;
//        dd($factory.Factory::class.reg_user::factory());
//        dd(BackendUserFactory::make(3,reg_user::class));
//        $i=3;
//        while($i<=3){
//            reg_user::factory()->make([
//                'name' => fake()->firstName(),
//                'surname'=>fake()->lastName(),
//                'nickname'=>fake()->firstNameFemale(),
//                'phone'=>fake()->phoneNumber(),
//                'email' => fake()->unique()->safeEmail(),
//                'email_verified_at' => now(),
//                'address'=>fake()->address(),
//                'city'=>fake()->city(),
//                'state'=>fake()->country(),
//                'zipcode'=>fake()->postcode(),
//                'remember_token' => Str::random(10),
//            ]);
//            $i+=1;
//        }
        reg_user::truncate();
        $number_of_user=1000;
        reg_user::factory()->count($number_of_user)->create();


    }
}
