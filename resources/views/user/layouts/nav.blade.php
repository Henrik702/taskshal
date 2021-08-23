<nav class="navbar-expand-lg">
    <div class="nav-head d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <span>UEX SHIPPIN GROUP INC. 13154 #b Leadwell street Nort. Hollywood 91605. Los-Angeles CA.</span>
                </div>
                @if(isset(Auth::user()->role) &&  Auth::user()->role == 'admin')
                    <div class="col-auto">
                        <a href="{{url('/text')}}" class="sign-in">Admin panel</a>
                    </div>
                @endif
                @if(isset(Auth::user()->role) &&  Auth::user()->role == 'manager')
                    <div class="col-auto">
                        <a href="{{url('/orders')}}" class="sign-in">Manager panel</a>
                    </div>
                @endif
                @if(!\Illuminate\Support\Facades\Auth::user())
                    <div class="col-auto">
                        <a href="{{url('login')}}" class="sign-in"><img src="{{asset('user/images/icons/login.svg')}}" alt=""> Login</a>
                        <a href="{{url('register')}}" class="sign-up"><img src="{{asset('user/images/icons/register.svg')}}" alt=""> Register</a>
                    </div>
                @else
                    <div class="col-auto">
                        <form method="post" action="{{url('logout')}}" >
                            @csrf
                            <button style="border: none; font-weight: normal; padding: 0px 1rem;"  class="sign-in btn"><img src="{{asset('user/images/icons/login.svg')}}" alt=""> Logout</button>

                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="nav-main">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 col-lg-auto d-flex justify-content-between align-items-center">
                    <a href="{{url('/')}}" class="logo">
                        <img src="user/images/logo.svg" alt="" class="img-fluid">
                    </a>
                    <div class="d-flex align-items-center">
                        <a href="tel:(818) 658-1818" class="tel d-block d-lg-none">(818) 658-1818</a>
                        <div class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                             aria-controls="navbar" aria-expanded="false">
                            <img src="user/images/icons/menu-burger.svg" alt="" class="burger">
                            <img src="user/images/icons/x.svg" alt="" class="close">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="collapse navbar-collapse row align-items-center" id="navbar">
                        <div class="col-12 col-lg">
                            <div class="nav-head mobile d-block d-lg-none ">
                                <span>UEX SHIPPIN GROUP INC. 13154 #b Leadwell street Nort. Hollywood 91605. Los-Angeles CA.</span>
                                <div class="row align-items-center actions">
                                    <div class="col-auto">
                                        <a href="/login" class="sign-in">
                                            <img src="/user/images/icons/login.svg" alt=""> Login
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="sign-up">
                                            <img src="user/images/icons/register.svg" alt=""> Register
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <ul class="menu navbar-nav">
                                <li class="navbar-item">
                                    <a href="{{url('/')}}#about">About</a>
                                </li>
                                <li class="navbar-item">
                                    <a href="{{'/'}}#services">Services</a>
                                </li>
                                <li class="navbar-item">
                                    <a href="{{'/'}}#dangerous">Dangerous goods</a>
                                </li>
                                <li class="navbar-item">
                                    <a href="{{url('/')}}#contacts">Contacts</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto d-flex align-items-center justify-content-center mt-3 mt-lg-0">
                            <a href="tel:(818) 658-1818" class="tel">(818) 658-1818</a>
                            <a href="{{url('/order')}}" class="btn">Order online</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

