<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use function Symfony\Component\HttpFoundation\Session\Storage\save;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
//        auth()->loginUsingId('2');
        $user=auth()->user();
        $post=Post::where('user_id','3')->first();
//        dd(Gate::allows('Post-Update',$user,$post));
//        if(Gate::allows('Post-Update',$post)){
//        if($user->can('Post-Update', $post)){
        // denies==!allow
//        dd(Gate::denies('Post-Update',$post));
//        dd(Gate::forUser(User::find('2'))->allows('Post-Update',$post));
//        if($this->authorizeForUser($user,'Post-Update',$post)){
        if(Gate::allows('Post-Update',$post)){
            var_dump([$user->id,$post->user_id]);
            $post->title='new_Jamal'.$user->name;
            $post->save();
            dd('Save shode');
        }else{
//            var_dump([$user->id,$post->user_id]);
//            dd('Natonest');
            abort(401,'Natonest');
        }

    }
}
