<?php

namespace Tests\Feature\views;

use App\Models\comment;
use App\Models\login_user;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class loginuserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserViewComment()
    {
//        $this->withoutExceptionHandling();
        $data=comment::where('user_id_comment',150)->paginate(30);
        $data_for_get_post_id=comment::where('user_id_comment',150)->first();
        $user_can_del_id=150;
        $Trashed_Comments_IDS=[1,2,3];
        $data=json_decode($data);
        $data_for_get_post_id=json_decode($data_for_get_post_id);
//        dd($data->post_id);
//        $this->actingAs($data->post_id);
//        $post_id=$data->post_id;
//        $post_id_for_test=$post_id;
        $response = $this->get(route('viewcomments', [$data_for_get_post_id->post_id,$user_can_del_id]));

        $response->assertStatus(200);
//        $response->assertViewIs('backend_project.viewcomments');
        $response->assertViewHasAll([
            'comments_all'=>$data,
            'user_can_del_id'=>150,
            'Trashed_Comments_IDS'=>$Trashed_Comments_IDS,
            'post_id'=>150
        ]);
//        $response->assertViewIs('/backend_project.viewcomments');
    }
}
