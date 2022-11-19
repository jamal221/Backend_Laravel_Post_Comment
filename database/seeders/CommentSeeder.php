<?php

namespace Database\Seeders;

use App\Models\comment;
use App\Models\login_user;
use App\Models\post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        comment::truncate();
        Schema::enableForeignKeyConstraints();
        $post_ids=post::pluck('id')->toArray();
        $post_count=post::pluck('id')->count();
        $user_ids=login_user::pluck('id')->toArray();
        $j=0;
//        dd($post_count);
        while($j<$post_count)
        {
            $i=0;
            $post_id_comment=array_rand($post_ids);
            if($post_id_comment==0){
                $post_id_comment+=1;
            }
            while($i<50){//Number of comments for each post
                $user_id_set_comment=array_rand($user_ids);
                if($user_id_set_comment==0){
                    $user_id_set_comment+=1;
                }
                comment::insert([
                    'post_id'=>$post_id_comment,
                    'user_id_comment'=>$user_id_set_comment,
                    'body'=>fake()->realText(255),
                    'created_at'=>now(),
                    'updated_at'=>now()


                ]);
                $i+=1;
            }
            $j+=1;
        }



//        $number_of_comment_per_post=post::pluck('id')->count();

//        dd(comment::factory());
//        comment::factory()->count(1)->create();

        //
    }
}
