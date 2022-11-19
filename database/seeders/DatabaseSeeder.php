<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use mysql_xdevapi\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        $this->call(UserTableSeeder::class);
//        $this->call(PostTableSeeder::class);
        $this->call(BackendUserSeeder::class);
        $this->call(LoginUserSeeder::class);
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();
    }
}
