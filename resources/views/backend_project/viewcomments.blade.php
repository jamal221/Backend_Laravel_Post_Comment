@extends('backend_project.Layouts.main')
@section('content')
    @php
        if(!\Illuminate\Support\Facades\Cache::store('database')->has('user_valid_web_level_0') and !\Illuminate\Support\Facades\Cache::store('database')->has('user_valid_web_level_1')  and !\Illuminate\Support\Facades\Cache::store('database')->has('user_valid_web_level_2') )
            {
                    echo '<script type="text/javascript">
                    location.replace("/login");
                    </script>';
            }
    @endphp
{{--{{dd($post_all["body"])}}--}}
<h1> User ID that can Delete comments has ID <mark>{{$user_can_del_id}}</mark></h1>
<h2 style="color: #0dcaf0">The Post ID is <mark>{{$post_id}}</mark></h2>
{{$counter=0}}
@php

@endphp
    <button type="button"   class="btn btn-info btn-xs Add_comment" id="{{$post_id}}" >Do you like to Add new comment to this post</button>
@foreach($comments_all as $items)
{{--    {{$post_all->count()}}--}}
{{--{{dd($post_all["title"])}}--}}
<div id="message"></div>
<div style="background-color: #b6effb" xmlns="http://www.w3.org/1999/html">
    <h2 style="background-color: #198754">
        @if($user_can_del_id == $items->user_id_comment )
            User <mark>{{$items->user_id_comment}}</mark> allow to delete/ restore the below comment
        @endif
    </h2>
        <h1>This Comment has been written by user <mark>{{$items->user_id_comment}}</mark></h1>
    </div>
    <div>
        <h2>Body Comment <mark>{{++$counter}}</mark></h2>
        {{$items->body}}
    </div>
    <div>
        <h3>Addtional Operation here like new comment, delete comment and edite comment</h3>
{{--        @if($user_can_del_id==$items->user_id_comment )--}}
{{--        {{dd((\App\Models\comment::CheckTrashID($items->id)==1))}}--}}
        @if(\Illuminate\Support\Facades\Cache::store('database')->has('user_valid_web_level_2') and (\App\Models\comment::CheckTrashID($items->id)==1))
            <button type="button"   class="btn btn-danger btn-xs restore_comment" style="background-color: chartreuse" id="{{$items->id}}" >Do you like to Restore {{$items->id}} th Comments</button>
        @else
           <button type="button"   class="btn btn-danger btn-xs del_comment" style="background-color: fuchsia" id="{{$items->id}}" >Do you like to delete {{$items->id}} th Comments</button>
        @endif

    @if(($user_can_del_id == $items->user_id_comment) and (\App\Models\comment::CheckTrashID($items->id)==1))
            <button type="button"   class="btn btn-danger btn-xs restore_comment" id="{{$items->id}}" >Do you like to Restore {{$items->id}} th Comments</button>
        @endif
    @if(($user_can_del_id == $items->user_id_comment) and (\App\Models\comment::CheckTrashID($items->id)==2))
            <button type="button"   class="btn btn-danger btn-xs del_comment" id="{{$items->id}}" >Do you like to delete {{$items->id}} th Comments</button>
        @endif

    </div>
@endforeach
{{-- Pagination --}}
<div >
    {{ $comments_all->appends(['sort' => 'department'])->links() }}
    {{--                {{ $data->fragment(['sort' => 'department'])->links() }}--}}
</div>

<script>
    $(document).on('click', '.del_comment', function(){
        var id = $(this).attr("id");
        if(!confirm("Are you sure you want to delete this Comment?"))
        {
            return false;
        }
            var token=$("meta[name='csrf-token']").attr("content");
            console.log({
                'id_comment':id,
                '_token':token
            });
            $.ajax({
                url:'delete_comment',
                method:"POST",
                data:{id:id,
                    _token:token
                },
                success:function(data)
                {
                    $('#message').html(data);
                    location.reload();
                    // fetch_data();
                }
            });
    });
    $(document).on('click', '.restore_comment', function(){
        var id = $(this).attr("id");
        if(!confirm("Are you sure you want to Restore this Comment?"))
        {
            return false;
        }
        var token=$("meta[name='csrf-token']").attr("content");
        console.log({
            'id_comment':id,
            '_token':token
        });
        $.ajax({
            url:'restore_comment',
            method:"POST",
            data:{id:id,
                _token:token
            },
            success:function(data)
            {
                $('#message').html(data);
                location.reload();
                // fetch_data();
            }
        });
    });
    $(document).on('click', '.Add_comment', function(){
        var id = $(this).attr("id");
        if(!confirm("Are you sure you want to Add new Comment?"))
        {
            return false;
        }
        var token=$("meta[name='csrf-token']").attr("content");
        console.log({
            'id_post':id,
            '_token':token
        });
        $.ajax({
            url:'Add_comment',
            method:"POST",
            data:{id_post:id,
                _token:token
            },
            success: function(data){ // What to do if we succeed
                $('#message').html(data);
                // location.reload();
            },
            error: function(data){
                alert('Error'+data);
                //console.log(data);
            }
        });
    });
</script>
@endsection()
