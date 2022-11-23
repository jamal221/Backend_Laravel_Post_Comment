@extends('backend_project.Layouts.main')
@section('content')
@php
    if(!\Illuminate\Support\Facades\Cache::store('database')->has('user_valid_web_level_0') and !\Illuminate\Support\Facades\Cache::store('database')->has('user_valid_web_level_1') and !\Illuminate\Support\Facades\Cache::store('database')->has('user_valid_web_level_2')  )
    {
            echo '<script type="text/javascript">
            location.replace("/login");
            </script>';
    }
@endphp
{{--{{ dd(\Illuminate\Support\Facades\Cache::store('database')->get('result_login')) }}--}}
{{--{{dd($fetched_user_json)}}--}}
{{--{{$fetched_user_json=\Illuminate\Support\Facades\Cache::store('database')->get('result_login')->toArray()}}--}}

@if(\Illuminate\Support\Facades\Cache::store('database')->has('user_valid_web_level_1') or \Illuminate\Support\Facades\Cache::store('database')->has('user_valid_web_level_0') or \Illuminate\Support\Facades\Cache::store('database')->has('user_valid_web_level_2') )
    @foreach(\Illuminate\Support\Facades\Cache::store('database')->get('result_login') as $items)
        <h1>Dear <mark>{{$items->name}}   {{$items->surname}} </mark> you loged to manage post page</h1>
    @endforeach
@endif

<h1> Life is pretty</h1>
<br>
@if(\Illuminate\Support\Facades\Cache::store('database')->has('user_valid_web_level_0') or \Illuminate\Support\Facades\Cache::store('database')->has('user_valid_web_level_1') or \Illuminate\Support\Facades\Cache::store('database')->has('user_valid_web_level_2') )

 <button type="button" class="btn btn-danger btn-xs showpost"  >View Posts</button>
@endif

<script>
    var _token = $('input[name="_token"]').val();
    $(document).on('click', '.showpost', function(){
        console.log('viewposts');
        location.replace("/viewposts");
    });
</script>
@endsection()
