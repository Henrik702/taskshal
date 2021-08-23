<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('images/favicon.ico')}}">

    <title>UEX</title>

    <link rel="stylesheet" href="{{asset('css/vendors_css.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/skin_color.css')}}">

</head>

<body class="hold-transition light-skin sidebar-mini theme-primary">
<div class="wrapper">

    <header class="main-header">
        <div class="d-flex align-items-center logo-box ">
            <a href="#" class="waves-effect waves-light nav-link rounded d-none d-md-inline-block mx-10 push-btn"
               data-toggle="push-menu" role="button">
                <i class="mdi mdi-menu"></i>
            </a>
            <!-- Logo -->
            <a href="{{url('/')}}" class="logo">
                <!-- logo-->
                <div class="logo-lg">
                    <span class="dark-logo">
                        UEX
                    </span>
                </div>
            </a>
        </div>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top pl-10">
            <!-- Sidebar toggle button-->
            <div class="app-menu">
                <ul class="header-megamenu nav">
                    <li class="btn-group nav-item d-md-none">
                        <a href="#" class="waves-effect waves-light nav-link rounded push-btn" data-toggle="push-menu"
                           role="button">
                            <i class="mdi mdi-menu"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="navbar-custom-menu r-side">
                <ul class="nav navbar-nav">
                    <li class="btn-group nav-item d-lg-inline-flex d-none">
                        <a href="#" data-provide="fullscreen"
                           class="waves-effect waves-light nav-link rounded full-screen" title="Full Screen">
                            <i class="mdi mdi-arrow-expand-all"></i>
                        </a>
                    </li>

                    <!-- User Account-->
                    <li class="dropdown user user-menu">
                        <a href="#" class="waves-effect waves-light dropdown-toggle p-5 w-auto" data-toggle="dropdown"
                           title="User">

                            <strong>{{Auth::user()->first_name }} </strong> {{ Auth::user()->last_name }}
                        </a>
                        <ul class="dropdown-menu animated flipInX">
                            <li class="user-body">
                                <a class="dropdown-item" href="{{url('/')}}"><i class="ti-user text-muted mr-2"></i> Home</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                        class="ti-lock text-muted mr-2"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>

                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar-->
        <section class="sidebar">
            <!-- sidebar menu-->
            <ul class="sidebar-menu" data-widget="tree">

                <li class="{{ (request()->is('/')) ? 'active' : '' }}">
                    <a href="{{url('/')}}">
                        <i class="mdi mdi-home"></i>
                        <span>Home</span>
                    </a>
                </li>

                @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')

                <li class="{{ Request::is('product') ? 'active' : '' }}">
                    <a href="{{route('all.products')}}">
                        <i class="mdi mdi-dropbox"></i>
                        <span>Product all</span>
                    </a>
                </li>
                @endif
                <li class="{{ Request::is('product') ? 'active' : '' }}">
                    <a href="{{route('product.index')}}">
                        <i class="mdi mdi-dropbox"></i>
                        <span>My Product</span>
                    </a>
                </li>

            </ul>
        </section>
    </aside>

    @yield('content')

    <footer class="main-footer">
    </footer>

    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<script src="{{asset('js/vendors.min.js')}}"></script>
<script src="{{asset('assets/icons/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/vendor_components/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
<script src="{{asset('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('assets/vendor_components/select2/dist/js/select2.full.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('script')
<script src="{{asset('js/pages/validation.js')}}"></script>
<script src="{{asset('js/pages/form-validation.js')}}"></script>
<script src="{{asset('js/template.min.js')}}"></script>
<script src="{{asset('js/pages/dashboard.js')}}"></script>
<script src="{{asset('js/demo.js')}}"></script>


</body>
</html>
