<?php

namespace Database\Seeders;

use App\Models\login_user;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Symfony\Component\String\length;
use Illuminate\Support\Facades\Schema;


class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        dd(post::factory()->count(1));
        Schema::disableForeignKeyConstraints();
        Post::truncate();// this function delete data in table
        Schema::enableForeignKeyConstraints();
        $number_of_post=1000;
        post::factory()->count($number_of_post)->create();

//        $users=login_user::find();
//        dd($users);
//        $usersIDs=login_user::pluck('id')->toArray();
        // we would like to insert 1000 post in post table of db
//        $i=1;
//        while($i<=10){
//            post::insert([
//                'UserID_Set_Post'=>array_rand($usersIDs),
//                'title'=>fake()->jobTitle(),
//                'body'=>str_repeat(fake()->realText(200),'2')
//
//            ]);
//            $i+=1;
//        }
//        while($i<=10){
//            post()->create([
//                'UserID_Set_Post'=>random_int(1,8),
//                'title'=>fake()->title(),
//                'body'=>str_repeat(fake()->realText(200),'2')
//            ]);
//            $i+=1;
//        }


//        $this->newPost(login_user::class);
//        foreach ($users as $userdata){
////            echo $userdata->email;
//            $this->newPost($userdata);
//        }
//        $posts=[
//            ['name'=>'jamal1','email'=>'jamal1@gmail.com','password'=>Hash::make('111111')],
//            ['name'=>'jamal2','email'=>'jamal2@gmail.com','password'=>Hash::make('222222')],
//            ['name'=>'jamal3','email'=>'jamal3@gmail.com','password'=>Hash::make('333333')]
//        ];
//        foreach ($posts as $postdata){
//            Post::insert($postdata);
//        }
    }

//    private function newPost(login_user $user_data)
//    {
//        $usersIDs=$user_data::pluck('id')->toArray();
//        $i=1;
//        while($i<=1000){
//            $user_data->post()->create([
//                'UserID_Set_Post'=>random_int(1,$usersIDs),
//                'title'=>fake()->title(),
//                'body'=>str_repeat(fake()->realText(200),'2')
//            ]);
//            $i+=1;
//        }
//    }


}
