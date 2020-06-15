<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('public/front/css/jquery.nice-number.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/hover.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/app.css')}}">
    <title>تم ارسال الطلب</title>
</head>
<body>


<div class="done-request">
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 text-center">
                <img class="img-responsive" src="{{asset('public/front/images/done.png')}}" alt="" width="200">
            </div>
            <div class="clearfix"></div>
            <div class="col-12 text-center mt-3">
                <h2>تم ارسال الطلب</h2>
                <p>الطلب في حاله الانتظار ويتم الدفع عند الاستلام</p>
                <a href="{{route('myorder')}}" class="btn btn-block text-white bg-light-green mb-1"> صفحه طلباتي </a>

            </div>


        </div>
    </div>
</div>

<script src="{{asset('public/front/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/front/js/jquery.nice-number.js')}}"></script>
<script src="{{asset('public/front/js/bootstrap.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('public/front/js/main.js')}}"></script>
</body>
</html>




