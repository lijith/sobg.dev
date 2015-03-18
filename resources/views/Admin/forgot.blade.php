<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Forgot Password</title>

    <!--Core CSS -->
    <link href="{{asset('packages/admin/bs3/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('packages/admin/css/bootstrap-reset.css')}}" rel="stylesheet">
    <link href="{{asset('packages/admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{asset('packages/admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('packages/admin/css/style-responsive.css')}}" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" method="POST" action="{{ route('sentinel.reset.request') }}" accept-charset="UTF-8">
        <h2 class="form-signin-heading">Submit your email address </h2>
        <div class="login-wrap">
            <div class="user-login-info">
                <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                    <input class="form-control" placeholder="E-mail" autofocus="autofocus" name="email" type="text" value="{{ Input::old('name') }}">
                    {{ ($errors->has('email') ? $errors->first('email') : '') }}
                </div>
            </div>
            
            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input class="btn btn-primary" value="Send Instructions" type="submit">

        </div>


      </form>

    </div>

            

    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
    <script src="{{asset('packages/admin/js/jquery.js')}}"></script>
    <script src="{{asset('packages/admin/bs3/js/bootstrap.min.js')}}"></script>

  </body>
</html>

