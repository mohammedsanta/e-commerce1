@extends('supplier.index')

@section('content')
    <div class="box-form">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="/pictures/admin1.png" alt="CoolAdmin" width="100px">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('supplier.login') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="au-input au-input--full" type="name" name="name" placeholder="Name">
                                </div>

                                @error('name')
                                    {{$message}}
                                @enderror

                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>

                                @error('password')
                                    {{$message}}
                                @enderror

                                <div class="login-checkbox">
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                    </div>
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="{{ route('supplier.register') }}">Sign Up Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection