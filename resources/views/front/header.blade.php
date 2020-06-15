<div id="mySidenav" class="sidenav">
    <div class="text-center">
        <img src="{{asset('public/front/images/tt.png')}}" width="150" alt="">
    </div>

    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <a href="{{route('index')}}">
        <i class="fas fa-store-alt pl-2"></i>
        <span>الرئيسية</span>
    </a>
    <a href="{{route('about')}}">
        <i class="fas fa-apple-alt pl-2"></i>
        <span>من نحن</span>
    </a>

    @if(auth()->guard('client-web')->check())
        <a href="{{route('profile.client',auth('client-web')->user()->id)}}">
            <i class="far fa-user-circle pl-2"></i>
            <span>صفحتى الشخصية </span>
        </a>
    @else
        <a href="{{route('register.client')}}">
            <i class="fas fa-shopping-basket pl-2"></i>
            <span>تسجيل حساب جديد </span>
        </a>
        <a href="{{route('login.client')}}">
            <i class="fas fa-shopping-basket pl-2">
            </i><span>تسجيل الدخول </span>
        </a>
    @endif
    <a href="{{route('contact.client')}}">
        <i class="fas fa-phone-volume pl-2"></i>
        <span>اتصل  بنا </span>
    </a>
    <a href="#">
        <i class="fas fa-share-alt pl-2"></i>
        <span>مشاركة البيانات</span>
    </a>
    <a href="#">
        <i class="fas fa-star-half-alt pl-2"></i>
        <span>تقييم التطبيق </span>
    </a>
    @if(auth()->guard('client-web')->check())
        <a href="{{route('logout')}}">
            <i class="fas fa-sign-out-alt pl-2"></i>
            <span>خروج </span>
        </a>
    @endif
</div>

