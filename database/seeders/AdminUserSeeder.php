<?php

namespace Database\Seeders;

use App\Models\admin_user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        admin_user::truncate();
        $number_of_user=10;
        admin_user::factory()->count($number_of_user)->create();
    }
}
