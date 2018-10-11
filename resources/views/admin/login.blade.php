<?php
/**
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 9/14/2018
 * Time: 8:51 AM
 */
?>
        <!DOCTYPE html>
<html>

<head>
    <title>Management Categories Book Library</title>
    <base href="{{asset('')}}">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">


    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>
<body>
{{--Navigation--}}
<div>
    <nav class="fixed-top navbar navbar-expand-lg navbar-dark bg-primary " >
        <a class="navbar-brand" href="#">Management Book System</a>

    </nav>
    <br><br><br>

    {{--Page Content--}}
    <div class="container">

        <div class="card mx-auto" style="width: 25rem;">
            <img class="card-img-top mx-auto" style="width: 40%;" src="image/login.png" alt="Login Icon">
            <div class="card-body">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                @if(session('notification'))

                        {{session('notification')}}

                @endif
                <form role="form" action="admin/login" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="log_email" id="log_email"  placeholder="Enter email" required>
                        <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="log_pass" name="log_pass" placeholder="Password" required>
                        <small id="p_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="showPass()">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt">&nbsp;</i>Login</button>
                    <span><a href="{{'admin/register'}}" style="margin-left: 30px;">Register</a></span><br>
                </form>
            </div>

            <div>
                <div class="card-footer"><a href="#" >Forget Password?</a></div>
            </div>
        </div>
    </div>
    {{--/#Page Content--}}
</div>


    <script type="text/javascript">
        //show password
        function showPass() {
            var x = document.getElementById("log_pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>





