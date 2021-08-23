@extends('user.layouts.app')
@section('content')
    <section class="login container small-container">
        <img src="images/logo.svg" alt="" class="img-fluid">
        <ul class="nav nav-pills  login-tabs my-5" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a
                    @if(Route::current()->getName() == 'login' || Route::current()->getName() == null)
                    class="active"
                    aria-selected="true"
                    @endif
                    id="pills-login-tab"
                    data-toggle="pill"
                    href="#pills-login"
                    role="tab"
                    aria-controls="pills-login"
                >Login</a>
            </li>
            <li class="seperator"></li>
            <li class="nav-item" role="presentation">
                <a
                    @if(Route::current()->getName() == 'register')
                    class="active"
                    aria-selected="true"
                    @endif
                    id="pills-register-tab"
                    data-toggle="pill"
                    href="#pills-register"
                    role="tab"
                    aria-controls="pills-register"
                >Register</a>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade @if(Route::current()->getName() == 'login' || Route::current()->getName() == null) show active @endif" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                <form method="POST" action="{{ route('login') }}"  class="text-start">
                    @csrf
                    <label>
                        <span>Email address</span>
                        <input type="email" name="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </label>
                    <label class="mt-3">
                        <span>Password</span>
                        <input type="password" name="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </label>
                    <div class="d-flex justify-content-between my-3">
                        <label class="checkbox">
                            <input type="checkbox" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span>Remember me</span>
                        </label>
                        <a href="#" class="text-decoration-underline">Forgot password?</a>
                    </div>
                    <button class="btn w-100">Login</button>
                </form>
            </div>
            <div class="tab-pane fade @if(Route::current()->getName() == 'register') show active @endif" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
                <form method="POST" action="{{ route('register') }}"  class="text-start">
                    @csrf
                    <label>
                        <span>Full name</span>
                        <input type="text" name="full_name" required>

                        @error('full_name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </label>
                    <label class="mt-3">
                        <span>Email address</span>
                        <input type="email" name="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </label>
                    <label class="mt-3">
                        <span>Phone number</span>
                        <input type="text" name="phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </label>
                    <label class="mt-3">
                        <span>Password</span>
                        <input type="password" name="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </label>
                    <label class="mt-3">
                        <span>Repeat password</span>
                        <input type="password" name="password_confirmation">
                    </label>
                    <button class="btn w-100 mt-4">Register</button>
                </form>
            </div>
        </div>
    </section>
@endsection


