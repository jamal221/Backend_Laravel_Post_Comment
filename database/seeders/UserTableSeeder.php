<?php

namespace Database\Seeders;

use App\Models\reg_user;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();// this function delete data in table
//        $users=[
//            'name'=>fake()->name(),
//            'email'=>fake()->safeEmail(),
//             'password'=>fake()->password(6,12)
////            ['name'=>'jamal1','email'=>'jamal1@gmail.com','password'=>Hash::make('111111')],
////            ['name'=>'jamal2','email'=>'jamal2@gmail.com','password'=>Hash::make('222222')],
////            ['name'=>'jamal3','email'=>'jamal3@gmail.com','password'=>Hash::make('333333')]
//        ];
//        foreach ($users as $userdata){
//            User::insert($userdata);
//        }
//        User::insert($users);
        reg_user::factory()->count(10)->make();


    }
}
