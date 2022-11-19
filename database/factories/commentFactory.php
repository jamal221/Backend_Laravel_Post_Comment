<?php

namespace Database\Factories;

use App\Models\comment;
use App\Models\login_user;
use App\Models\post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\comment>
 */
class commentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $post_ids=post::pluck('id')->toArray();
        $user_ids=login_user::pluck('id')->toArray();

        $i=0;
        $post_id_comment=array_rand($post_ids);
        while($i<5){//Number of comments for each post
            comment::insert([
                'post_id'=>$post_id_comment,
                'user_id_comment'=>array_rand($user_ids),
                'body'=>fake()->realText(255)

            ]);
            $i+=1;
        }
//        dd($data_all);

    }
}
