<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>الثمار الوطنية</title>
    <!-- Tell the browser to be responsive to screen width -->
    {{--<link rel="stylesheet" href="select2.css">--}}
    {{--<link rel="stylesheet" href="select2-bootstrap4.css">--}}

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('public/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('public/adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/adminlte/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('public/adminlte/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    {{-- for arabic version--}}
    <link rel="stylesheet" href="{{asset('public/adminlte/dist/css/rtl/AdminLTE-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/adminlte/dist/css/rtl/bootstrap-rtl.min.css')}}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]><!--    <![endif]-->


    {{--// this for package confirm delete--}}

    <link rel="stylesheet" href="{{asset('jquery_confirm/jquery-confirm.min.css')}}">

    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">--}}


    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page"
      style="background-image: url({{ asset('dashboard_files/img/user_bg4.jpg') }});">

<div class="login-box">
    @include('flash::message')
    <div class="login-logo">
        {{--<a href="{{ asset('public/dashboard_files/') }}index2.html"><b>To</b>oot</a>--}}
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <center>
        <img src="{{ asset('public/adminlte/dist/img/tt.png') }}" alt="image"
        style="width: 100px;height: 100px; padding-bottom: 10px;">
        </center>
        <p class="login-box-msg">قم بتسجيل الدخول</p>


        <form method="POST" action="{{route('dashboard.login')}}" style="margin-top: 10px">
            @csrf
            <div class="form-group has-feedback">

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                       placeholder="البريد الالكتروني" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

            </div>
            <div class="form-group has-feedback">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       placeholder="كلمه المرور" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            {{--<input type="checkbox"> Remember Me--}}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-12" >

                    <button  type="submit" class="btn btn-block btn-success text-white bg-light-green mb-1">تسجيل الدخول</button>

                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('public/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('public/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('public/adminlte/dist/iCheck/icheck.min.js') }}"></script>
<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>

</html>