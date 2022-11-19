<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\login_user;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class backendcontroller extends Controller
{
    //
    public function index()
    {
//        $name="jamal Goli";
//        $n1=\Symfony\Component\String\split($name,2,' ');
//        dd($n1);
        return view('backend_project.layouts.backend_index');
    }

    public function login()
    {
        return view('backend_project.loginback');
    }

    public function checkuser(Request $request)
    {

        if ($request->ajax()){
//        if(1==1){
//            dd('checkuser Function');
            $received_username=$request->user1;
            $received_password=$request->pass1;
//            dd($received_username);
            $fetched_user = DB::table('login_users')
                ->join('reg_users', 'login_users.user_id', '=', 'reg_users.id')
                ->select('reg_users.*','login_users.*')
                ->where('login_users.username','=',$received_username)
                ->where('login_users.password','=',$received_password)
                ->distinct()
                ->get();
//            $fetched_user2=json_decode($fetched_user, true);
//            $fetched_user2=json_decode($fetched_user2);
//            dd($fetched_user2->user_id);
            $fetched_user_count = DB::table('login_users')
                ->join('reg_users', 'login_users.user_id', '=', 'reg_users.id')
                ->select('reg_users.*','login_users.*')
                ->where('login_users.username','=',$received_username)
                ->where('login_users.password','=',$received_password)
                ->distinct()
                ->get()
                ->count();

//            dd ($fetched_user_json);
//            $name_user=$fetched_user->name;
//            $surname_user=$fetched_user->surname;
            if($fetched_user_count){
//                echo 123;
//                echo "post_man1"; // for test postman
//                $ID_user=DB::table('login_users')
//                ->select('user_id')
//                ->where('username',$received_username)
//                    ->get();
//                dd($ID_user);
                Artisan::call('cache:clear');
                $fetched_user_json=json_decode($fetched_user, true);
                Cache::store('database')->add('user_valid_web',$received_username,now()->addMinutes(20));
                Cache::store('database')->add('result_login', $fetched_user, now()->addMinutes(20));
//                Cache::store('database')->add('user_logged_id', $ID_user, now()->addMinutes(20));
                Cache::lock('user_valid_web', 'result_login');
                echo 123;

//                return view('backend_project.logged', compact('fetched_user_json'));

            }else{
                echo 321;
            }
//            dd([$name_user,$surname_user]);

        }
//        echo 123;
//            dd('checkuser here');
//        $fetched_user=DB::table('login_users')
//            ->select('*')
//            ->where('username','=',$received_username )
//            ->where('password','=',$received_password)
//            ->get();




    }

    public function logged()
    {
        return view('backend_project.logged');
    }

    public function viewposts()
    {
        $post_all=DB::table('posts')
            ->select('*')
            ->paginate(30);

//        $post_all_json=json_decode($post_all);
//        dd($post_all);
        Cache::store('database')->increment('user_valid_web',5);
        return view('backend_project.viewposts', compact('post_all'));
    }

    public function viewcommentsCTL(Request $request)
    {
//        dd([$request->post_id, $request->user_set_id]);
        if(1==1) {
    //        dd([$request->post_id, $request->user_set_id]);
//                $comments_all = DB::table('comments')
//                    ->select('*')
//                    ->where('post_id', '=', $request->post_id)
//                    ->where('deleted_at','=', null)
//                    ->paginate(25);
            $post_id=$request->post_id;
            $comments_all=comment::withTrashed()
                        ->where('post_id', '=', $post_id)
                        ->orderByDesc('created_at')
                        ->paginate('25');
            $Trashed_Comments_IDS=comment::onlyTrashed()
                ->select('id')
                ->where('post_id', '=', $request->post_id)
                ->get()
                ->toArray();


                        $user_can_del_id = $request->user_set_id;
                        Cache::store('database')->increment('user_valid_web',3);
//                dd($comments_all);
                return view('/backend_project.viewcomments', compact('comments_all', 'user_can_del_id','Trashed_Comments_IDS','post_id'));
    //        $comments_all=comment::where('post_id',$request->post_id)->paginate(25);
    //        $pos=post::where('id',$request->post_id);
    //        $comments_all=(new \App\Models\comment)->show_comment;
    //        dd($comments_all);
    //        $comments_all= (new \App\Models\comment)->show_comment($request->post_id)->toArray();// By the way I define new function in model for calling
    //        $comments_all=($request->post_id)->comment->show_comment;


    //        dd($user_can_del_id);
    //        dd($comments_all);
//            return view('backend_project.layouts.backend_index');

        }
    }

    function del_comment(Request $request)// Delete comments from post
    {

        if($request->ajax())
        {
//            dd($request->id());
            Cache::store('database')->increment('user_valid_web',2);
            try{

//                DB::beginTransaction();
                $del_comment=comment::where('id',$request->id)->delete();
                if($del_comment  )
                {
                    echo '<div class="alert alert-success">Comment Deleted</div>';
//                    DB:: commit();
                }
                else
                {
                    echo '<div class="alert alert-danger">Error accured </div>';
//                    DB::rollBack();
                }


            }
            catch (\Exception $e)
            {
//                DB::rollBack();
                echo '<div class="alert alert-danger">Error accured </div>';
                Log::error($e);
//                throw $e;
            }

        }
    }
    function restore_comment(Request $request)// Restore comment from
    {

        if($request->ajax())
        {
            Cache::store('database')->increment('user_valid_web',2);
//            dd($request->id());
            try{

//                DB::beginTransaction();
                $res_comment=comment::where('id',$request->id)->restore();
                if($res_comment  )
                {
                    echo '<div class="alert alert-success">Comment successfuly has been restored</div>';
//                    DB:: commit();
                }
                else
                {
                    echo '<div class="alert alert-danger">Error accured </div>';
//                    DB::rollBack();
                }


            }
            catch (\Exception $e)
            {
//                DB::rollBack();
                echo '<div class="alert alert-danger">Error accured </div>';
                Log::error($e);
//                throw $e;
            }

        }
    }
    function Add_comment(Request $request)// Add new comment
    {

        if($request->ajax())
//        if(1==1)
        {
//            dd($request->id());
//            try{

//                DB::beginTransaction();
//                $user_ids=login_user::pluck('id')->toArray();
//                dd(Cache::store('database')->get('result_login')->toArray()[0]->user_id);
                $comment2=new comment();
                $comment2->post_id=$request->id_post;
                $comment2->user_id_comment=Cache::store('database')->get('result_login')->toArray()[0]->user_id;
                $comment2->body=fake()->realText(255);


                if($comment2->save()  )
                {
                    echo '<div class="alert alert-success">Comment successfuly has been saved</div>';
//                    DB:: commit();
                }
                else
                {
                    echo '<div class="alert alert-danger">Error accured </div>';
//                    DB::rollBack();
                }


//            }
//            catch (\Exception $e)
//            {
////                DB::rollBack();
//                echo '<div class="alert alert-danger">Error accured </div>';
//                Log::error($e);
////                throw $e;
//            }

        }
    }

}
