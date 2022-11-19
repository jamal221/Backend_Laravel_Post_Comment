@extends('backend_project.Layouts.main')
@section('content')
{{--{{dd($post_all["body"])}}--}}

@if(\Illuminate\Support\Facades\Cache::store('database')->has('result_login'))

@else
        {
        echo '<script type="text/javascript">
            location.replace("/login");
        </script>';
    }
@endif
@foreach(\Illuminate\Support\Facades\Cache::store('database')->get('result_login') as $items)
    <h1>The User who loged has this ID <mark> {{$items->user_id}}</mark> </h1>;
@endforeach
@foreach($post_all as $items)
{{--    {{$post_all->count()}}--}}
{{--{{dd($post_all["title"])}}--}}
<div id="message"></div>
<div style="background-color: #0dcaf0" xmlns="http://www.w3.org/1999/html">
        <h1>Post title {{$items->id}} has been written by user {{$items->UserID_Set_Post}}</h1>
    <mark>{{$items->title}}</mark>
    </div>
    <div>
        <h2>Body Post</h2>
        {{$items->body}}
    </div>
    <div>
        <h3>Comment Here</h3>
        <form action="{{route('viewcomments')}}" method="get">
            <input name="post_id" value="{{$items->id}}" hidden>
            <input name="user_set_id" value="{{$items->UserID_Set_Post}}" hidden >
{{--            data-id="{{$items->id."_".$items->UserID_Set_Post}}" value="{{$items->id}}"--}}
            <button     > View Post Comments {{$items->id}}</button>
        </form>
    </div>
@endforeach
{{-- Pagination --}}
<div >
    {{ $post_all->appends(['sort' => 'department'])->links() }}
    {{--                {{ $data->fragment(['sort' => 'department'])->links() }}--}}
</div>
<script>
    // $(document).on('click', '.post_comment_view', function(){
    //     // var btn_id=document.getElementsByName("post_comment_view").value;
    //     // var _token=$("meta[name='csrf-token']").attr("content");
    //
    //     var btn_id_all = $(this).data("id").split("_");
    //     var btn_id=btn_id_all[0];
    //     var btn_id_user=btn_id_all[1];
    //     // console.log({
    //     //     post_id:btn_id,
    //     //     user_set_id:btn_id_user
    //     // });
    //     // location.replace("/viewcomments");
    //     if(btn_id != '' )
    //     {
    //         //document.getElementById("demo").innerHTML = msg_user;
    //         try
    //         {
    //             var token=$("meta[name='csrf-token']").attr("content");
    //             console.log({
    //                 post_id:btn_id,
    //                 user_set_id:btn_id_user,
    //                 _token:token
    //             });
    //
    //             $.ajax({
    //                 url:'viewcommentsCTL',
    //                 method:"POST",
    //                 data:{
    //                     post_id:btn_id,
    //                     user_set_id:btn_id_user,
    //                     _token:token
    //                 },
    //                 success: function(data){ // What to do if we succeed
    //                     $('#message').html("Comments processed succesfuly");
    //                     // window.location.replace("/viewcomments");
    //                     // location.replace("/viewcomments");
    //                     //     ?post_id=1&user_set_id=13
    //                     // location.replace("/viewcomments?post_id="+btn_id&"AAAAAAA"+token&"user_set_id="+btn_id_user"");
    //                     // location.replace("/viewcomments");
    //                     // if(data ==123){
    //                     //     location.replace("/logged");
    //                     // }
    //                     // else{
    //                     //     $('#message').html("User and Password is incorrect")
    //                     // }
    //                 },
    //                 error: function(data){
    //                     //alert('Error'+data);
    //                     console.log(data);
    //                 }
    //             })
    //         }
    //         catch (e) {
    //             $('#message').html("<div class='alert alert-danger'>در دریافت و ارسال به پایگاه  خطای روی داده است.</div>");
    //
    //         }
    //     }// end if check empty box
    //     else {
    //         $('#message').html("<div class='alert alert-danger'>Both Fields are required</div>");
    //     }
    //
    // });
</script>
@endsection()
