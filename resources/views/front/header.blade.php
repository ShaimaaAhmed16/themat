{{--<div id="mySidenav" class="sidenav " style="direction: {{app()->isLocale('ar')?'rtl':'ltr' }}">--}}
<div id="mySidenav" class="sidenav ">
    <div class="text-center">
        <img src="{{asset('public/front/images/tt.png')}}" width="150" alt="">
    </div>

    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    @if(auth()->guard('client-web')->check())
    <a href="{{route('index')}}">
        <i class="fas fa-store-alt pl-2 " ></i>
        <span >{{trans('lang.home')}}</span>
    </a>
        @else
        <a href="{{route('login.client')}}">
            <i class="fas fa-store-alt pl-2"></i>
            <span>{{trans('lang.home')}}</span>
        </a>
    @endif
    <a href="{{route('about')}}">
        <i class="fas fa-apple-alt pl-2"></i>
        <span>{{trans('lang.about')}}</span>
    </a>

    <a href="{{route('usePolicy')}}">
        <i class="fas fa-apple-alt pl-2"></i>
        <span>{{trans('lang.use_policy')}}</span>
    </a>

    @if(auth()->guard('client-web')->check())
        <a href="{{route('profile.client',auth('client-web')->user()->id)}}">
            <i class="far fa-user-circle pl-2"></i>
            <span>{{trans('lang.my_personal_page')}}</span>
        </a>
    @else
        <a href="{{route('register.client')}}">
            <i class="fas fa-shopping-basket pl-2"></i>
            <span>{{trans('lang.register')}}</span>
        </a>
        <a href="{{route('login.client')}}">
            <i class="fas fa-shopping-basket pl-2">
            </i><span>{{trans('lang.login')}}</span>
        </a>
    @endif
    <a href="{{route('contact.client')}}">
        <i class="fas fa-phone-volume pl-2"></i>
        <span>{{trans('lang.contact_us')}}</span>
    </a>
    <a href="#">
        <i class="fas fa-share-alt pl-2"></i>
        <span>{{trans('lang.share_data')}}</span>
    </a>
    <a href="#">
        <i class="fas fa-star-half-alt pl-2"></i>
        <span>{{trans('lang.application_evaluation')}}</span>
    </a>
    @if(auth()->guard('client-web')->check())
        <a href="{{route('logout')}}">
            <i class="fas fa-sign-out-alt pl-2"></i>
            <span>{{trans('lang.logout')}}</span>
        </a>
    @endif
</div>

