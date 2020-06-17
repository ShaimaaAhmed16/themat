<nav class="navbar fixed-bottom text-center row bg-gray">

    @if(auth()->guard('client-web')->check())
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
                {{--<a href="{{route('index')}}" class="text-dark">--}}
                <div>
                    <img src="{{asset('public/front/images/bar-2.png')}}" width="20" alt="">
                </div>

                منتجاتنا
            </a>

        </div>
    @else
        <div class="nav-item nav-link col-3">
            <a href="#"  class="text-dark"  data-toggle="modal" data-target="#exampleModal6">
                <div>
                    <img src="{{asset('public/front/images/menu.png')}}" width="20" alt="">
                </div>

                الرئيسية
            </a>

            <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            يجب التسجيل
                        </div>
                        <div class="modal-footer">

                            <a href="{{route('login.client')}}" class="btn bg-light-green btn-sm btn-block mt-2 myBtn2 text-white hvr-glow" style="border-radius: 20px;">
                                <small>التسجيل الان</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="nav-item nav-link col-3">
            <a href="#" class="text-dark"  data-toggle="modal" data-target="#exampleModal6">

                {{--<a href="{{route('index')}}" class="text-dark">--}}
                <div>
                    <img src="{{asset('public/front/images/bar-2.png')}}" width="20" alt="">
                </div>

                منتجاتنا
            </a>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            يجب التسجيل
                        </div>
                        <div class="modal-footer">

                            <a href="{{route('login.client')}}" class="btn bg-light-green btn-sm btn-block mt-2 myBtn2 text-white hvr-glow" style="border-radius: 20px;">
                                <small>التسجيل الان</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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

            <small>
                سلة الشراء
            </small>
        </a>
        @else
            <a href="{{route('login.client')}}" class="text-dark" data-toggle="modal" data-target="#exampleModal6">
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
            <a href="#" class="text-dark" data-toggle="modal" data-target="#exampleModal6">
            <div>
                <i class="far fa-user-circle text-dark"></i>
            </div>
                حسابى

            </a>
            <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            يجب التسجيل
                        </div>
                        <div class="modal-footer">

                            <a href="{{route('login.client')}}" class="btn bg-light-green btn-sm btn-block mt-2 myBtn2 text-white hvr-glow" style="border-radius: 20px;">
                                <small>التسجيل الان</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        @endif
    </div>


        <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        يجب التسجيل
                    </div>
                    <div class="modal-footer">

                        <a href="{{route('login.client')}}" class="btn bg-light-green btn-sm btn-block mt-2 myBtn2 text-white hvr-glow" style="border-radius: 20px;">
                            <small>
                                التسجيل الان
                            </small>
                        </a>
                    </div>
                </div>
            </div>
        </div>


</nav>