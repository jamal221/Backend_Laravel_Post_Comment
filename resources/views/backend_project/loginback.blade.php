<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords"
          content="unique login form,leamug login form,boostrap login form,responsive login form,free css html login form,download login form">
    <meta name="author" content="leamug">
    <title>
        @yield('PageTitle1')
        User Login
    </title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" id="style">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap core Library -->
{{--    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}
{{--    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
{{--    <!-- Google font -->--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">--}}
{{--    <!-- Font Awesome-->--}}
{{--    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">--}}
</head>
<body>
<!-- Page Content -->
@php
    if(\Illuminate\Support\Facades\Cache::store('database')->has('user_valid_web') )
    {
            echo '<script type="text/javascript">
            location.replace("/logged");
            </script>';
    }
@endphp
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-4 text-center">
            <h1 class='text-white'>login Page</h1>
            <br><br>
            <h1 id="message" class='text-black-50' style="text-decoration-color: #7b0861"></h1>
            <div class="form-login"></br>
                <h4>User Authentecation </h4>
                </br>
                @csrf
                <input type="text" id="userName" name="userName" class="form-control input-sm " placeholder="username"/>
                </br></br>
                <input type="password" id="userPassword" name="userPassword" class="form-control input-sm " placeholder="Password"/>
                </br></br>
                <div class="wrapper">
                        <span class="group-btn">

                            <button type="button" class="btn btn-danger btn-xs checkuser" >SignIn</button>
                            <button type="button" class="btn btn-danger btn-xs reguser" >SignOut</button>
{{--                            @component('component.button')--}}
{{--                                @slot('type')--}}
{{--                                    button--}}
{{--                                @endslot--}}
{{--                                @slot('class')--}}
{{--                                    btn btn-danger btn-xs checkuser--}}
{{--                                @endslot--}}
{{--                                @slot('title')--}}
{{--                                    ورورد--}}
{{--                                @endslot--}}


{{--                            @endcomponent--}}

                        </span>
                </div>
            </div>
        </div>
    </div>
    </br></br></br>
    <!--footer-->

    <!--//footer-->
</div>
</body>
</html>
<script>
    var _token = $('input[name="_token"]').val();
    $(document).on('click', '.checkuser', function(){

        var user_name1 = document.getElementById("userName").value;
        var pass_word1 =document.getElementById("userPassword").value;
        //var link_type=$("#opttypes["+countRow+"]"+" :selected").val();// how many time i spent on this line, my God
        //var link_type = document.getElementById("opttypes["+count_type+"]").value;
        //var link_type = sel.options[opttypes.selectedIndex];
        //document.getElementById("demo").innerHTML = document.getElementById("tweblinks").rows[countRow].cells.item(0).innerHTML;
        console.log({user1:user_name1, pass1:pass_word1});
        if(user_name1 != '' && pass_word1 != '' )

        {
            //document.getElementById("demo").innerHTML = msg_user;
            try
            {
                $.ajax({
                    method:"GET",
                    url:"checkuser",
                    data:{user1:user_name1, pass1:pass_word1},
                    success: function(data){ // What to do if we succeed
                        //$('#message').html("Okkkk")
                        console.log(data);
                        if(data ==123){
                            location.replace("/logged");
                        }
                        else{
                            $('#message').html("User and Password is incorrect")
                        }
                    },
                    error: function(data){
                        //alert('Error'+data);
                        console.log(data);
                    }
                })
            }
            catch (e) {
                $('#message').html("<div class='alert alert-danger'>در دریافت و ارسال به پایگاه  خطای روی داده است.</div>");

            }
        }// end if check empty box
        else {
            $('#message').html("<div class='alert alert-danger'>Both Fields are required</div>");
        }

    });
</script>
