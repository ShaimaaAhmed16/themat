<nav class="navbar fixed-bottom text-center row bg-gray">

    <div class="nav-item nav-link col-3">
        <a href="{{route('index')}}" class="text-dark">
        <div>
            <img src="{{asset('public/front/images/menu.png')}}" width="20" alt="">
        </div>

            الرئيسية
        </a>
    </div>

    <div class="nav-item nav-link col-3">
        <a href="{{route('index')}}" class="text-dark">
        <div>
            <img src="{{asset('public/front/images/bar-2.png')}}" width="20" alt="">
        </div>

            منتجاتنا
        </a>
    </div>
    <div class="nav-item nav-link col-3">
        @if(auth('client-web')->user())
        <a href="{{route('cart')}}" class="text-dark">
        <div>
            @if(Cart::count() > 0)
            <span class="badge ml-1">{{Cart::count()}}@else 0 @endif</span>
            <i class="fas fa-shopping-basket text-dark"></i>

        </div>

            <small>
                سلة الشراء
            </small>
        </a>
        @else
            <a href="{{route('login.client')}}" class="text-dark">
                <div>
                    @if(Cart::count() > 0)
                        <span class="badge ml-1">{{Cart::count()}} @endif</span>
                        <i class="fas fa-shopping-basket text-dark"></i>

                </div>

                <small>
                    سلة الشراء
                </small>
            </a>
        @endif
    </div>
    <div class="nav-item nav-link col-3">
        @if(auth('client-web')->user())
            <a href="{{route('myacount')}}" class="text-dark">

                <div>
                    <i class="far fa-user-circle text-dark"></i>
                </div>

                    حسابى

             </a>
        @else
            <a href="{{route('login.client')}}" class="text-dark">
            <div>
                <i class="far fa-user-circle text-dark"></i>
            </div>
                حسابى

            </a>
        @endif
    </div>




</nav>