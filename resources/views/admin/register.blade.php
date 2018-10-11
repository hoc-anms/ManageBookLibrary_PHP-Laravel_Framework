<?php
/**
 * Created by PhpStorm.
 * User: Hoc_Anms
 * Date: 9/14/2018
 * Time: 8:55 AM
 */
?>
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


    <div class="container">
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-header"><i class="fa fa-bullhorn">&nbsp;&nbsp;</i><span class="text-success">Register</span></div>
            <div class="card-body">
                @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
                @endif
                @if(session('notification'))
                        <div class="alert alert-success">
                            {{session('notification')}}
                        </div>
                    @endif
                <form role="form" action="admin/register" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
                        <small id="u_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="password1">Password</label>
                        <input type="password" name="password1" class="form-control" id="password1" placeholder="Password">
                        <small id="p1_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="password2">Re-enter Password</label>
                        <input type="password" name="password2" class="form-control" id="password2" placeholder="Password">
                        <small id="p2_error" class="form-text text-muted"></small>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label for="usertype">Usertype</label>--}}
                        {{--<select name="usertype" class="form-control" id="usertype">--}}
                            {{--<option value="">Choose User Type</option>--}}
                            {{--<option value="Admin">Admin</option>--}}
                            {{--<option value="Other">Other</option>--}}
                        {{--</select>--}}
                        {{--<small id="t_error" class="form-text text-muted"></small>--}}

                    {{--</div>--}}
                    <button type="submit" name="user_register" class="btn btn-primary">
                        <span class="fa fa-user"></span>&nbsp;Register
                    </button>
                    <span><a href="{{'admin/login'}}">Login</a></span>
                </form>
            </div>


        </div>
    </div>

    {{--/#Page Content--}}
</div>

<div>

</div>
</body>
</html>





