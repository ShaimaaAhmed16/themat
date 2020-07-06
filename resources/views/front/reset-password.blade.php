<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('public/front/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/app.css')}}">
    <title>{{trans('lang.national_fruits')}}</title>
</head>
<body>

    <section class="container text-center pt-3">
        <img src="{{asset('public/front/images/tt.png')}}" class="img-fluid" alt="" width="350">
    </section>
    <section class="signin">
        @if ($errors->any())
            <div class="alert alert-danger text-right">
                <ul class="">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </ul>
            </div>
        @endif
        @include('flash::message')
        <div class="card pt-3">
            <form class="container"  action="{{route('send.code')}}" method="POST">
                @csrf
                <div class="form-group {{app()->isLocale('ar')?'text-right':'text-left' }}">

                    <input type="text" class="form-control {{app()->isLocale('ar')?'text-right':'text-left' }}" placeholder="05xxxxxxxx {{trans('lang.phone')}}" name="phone">
                </div>
                <div class="mb-3 text-center">
                    <button  type="submit" class="btn text-white text-center bg-light-green">{{trans('lang.restore_password')}}</button>
                </div>
                <div class="d-flex justify-content-around">
                    <a href="{{route('login.client')}}"  class="btn text-white bg-secondary mb-1">{{trans('lang.login')}}</a>
                    <a href="{{route('register.client')}}"  class="btn mb-1 text-white bg-secondary">{{trans('lang.register')}}</a>
                </div>
            </form>
        </div>
    </section>


    <script src="{{asset('public/front/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('public/front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/front/js/main.js')}}"></script>
</body>
</html>