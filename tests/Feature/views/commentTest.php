<?php

namespace Tests\Feature\views;

use App\Models\comment;
use App\Models\login_user;
use App\Models\post;
use App\Models\reg_user;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class commentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testValidateInsertDatainComment()
    {
        $this->withoutExceptionHandling();
        $post = post::factory()->create();
//        dd($post);
//        $user_id_reg=reg_user::pluck('id')->toArray();
        $sur_user=reg_user::pluck('surname')->toArray();
//        $name_user=reg_user::pluck('name')->toArray();
//        $data_user=[
//        //
//        'user_id'=>random_int(50000, 100000),
//        'username'=>$sur_user,
////            'password'=>Number::random(6),
//        'password'=>fake()->password(6,12),
//        'created_at'=>now(),
//        'updated_at'=>now()
//    ];
        $user = login_user::factory()->state([
            'user_id' =>120000,
            'username' => "jamal",
            'password'=>fake()->password(6,12)
        ])->create();
//        $user = login_user::make($data_user)->create();
//        dd($user);


        $data = comment::factory()->state([
            'user_id_comment' => 120000,
            'post_id' => $post->id,
        ])->make()->toArray();
dd($data);
        $response = $this
            ->actingAs($user)
            ->withHeaders([
                'HTTP_X-Requested-with' => 'XMLHttpRequest'
            ])
            ->postJson(
                route('Add_comment'),
                ['post_id'=>$post->id,
                 'user_id_comment'=>120000,
                 'body'=>fake()->realText(255)
                    ]
            );

        $response
            ->assertOk()
            ->assertJson([
                'created' => true
            ]);
        $this->assertDatabaseHas('comments', $data);
    }
}
