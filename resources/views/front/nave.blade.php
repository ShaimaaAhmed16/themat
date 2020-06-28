<nav class="navbar fixed-bottom text-center row bg-gray" style="direction: {{app()->isLocale('ar')?'rtl':'ltr' }} ">

    @if(auth()->guard('client-web')->check())
        <div class="nav-item nav-link col-3">

            <a href="{{route('index')}}" class="text-dark">
                <div>
                    <img src="{{asset('public/front/images/menu.png')}}" width="20" alt="">
                </div>

                {{trans('lang.home')}}
            </a>
        </div>
        <div class="nav-item nav-link col-3">
            <a href="{{route('index')}}" class="text-dark">
                {{--<a href="{{route('index')}}" class="text-dark">--}}
                <div>
                    <img src="{{asset('public/front/images/bar-2.png')}}" width="20" alt="">
                </div>

                {{trans('lang.our_products')}}
            </a>

        </div>
    @else
        <div class="nav-item nav-link col-3">
            <a href="#"  class="text-dark"  data-toggle="modal" data-target="#exampleModal6">
                <div>
                    <img src="{{asset('public/front/images/menu.png')}}" width="20" alt="">
                </div>

                {{trans('lang.home')}}
            </a>


        </div>

        <div class="nav-item nav-link col-3">
            <a href="#" class="text-dark"  data-toggle="modal" data-target="#exampleModal6">

                {{--<a href="{{route('index')}}" class="text-dark">--}}
                <div>
                    <img src="{{asset('public/front/images/bar-2.png')}}" width="20" alt="">
                </div>

                {{trans('lang.our_products')}}
            </a>
        </div>
    @endif

    <div class="nav-item nav-link col-3">
        @if(auth('client-web')->user())
            <a href="{{route('cart')}}" class="text-dark">
                <div>
                    @if(Cart::count() > 0)
                        <span class="badge ml-1">{{Cart::count()}}@else 0 @endif</span>
                        <i class="fas fa-shopping-basket text-dark"></i>

                </div>
                {{trans('lang.your_cart')}}
            </a>
        @else
            <a href="{{route('login.client')}}" class="text-dark" data-toggle="modal" data-target="#exampleModal6">
                <div>
                    @if(Cart::count() > 0)
                        <span class="badge ml-1">{{Cart::count()}} @endif</span>
                        <i class="fas fa-shopping-basket text-dark"></i>

                </div>

                {{trans('lang.your_cart')}}

            </a>


        @endif
    </div>
    <div class="nav-item nav-link col-3">
        @if(auth('client-web')->user())
            <a href="{{route('myacount')}}" class="text-dark">

                <div>
                    <i class="far fa-user-circle text-dark"></i>
                </div>

                {{trans('lang.account')}}

            </a>
        @else
            <a href="#" class="text-dark" data-toggle="modal" data-target="#exampleModal6">
                <div>
                    <i class="far fa-user-circle text-dark"></i>
                </div>
                {{trans('lang.account')}}

            </a>

        @endif
    </div>



</nav>