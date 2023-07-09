@extends('supplier.index')

@section('content')
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
                        <form action="{{ route('supplier.register') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Username</label>
                                <input class="au-input au-input--full" type="text" name="name" placeholder="Username">
                            </div>
                            
                            @error('name')
                                {{$message}}
                            @enderror

                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                            </div>

                            @error('email')
                                {{$message}}
                            @enderror

                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                            </div>
                            
                            <div class="form-group">
                                    <label>Mobile</label>
                                    <input class="au-input au-input--full" type="texy" name="mobile" placeholder="Mobile">
                                </div>

                                @error('mobile')
                                    {{$message}}
                                @enderror

                                <div class="form-group">
                                    <label>Country</label>
                                    <input class="au-input au-input--full" type="text" name="country" placeholder="Country">
                                </div>

                                @error('country')
                                    {{$message}}
                                @enderror

                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="au-input au-input--full" type="text" name="address" placeholder="Address">
                                </div>

                                @error('address')
                                    {{$message}}
                                @enderror

                                <div class="form-group">
                                    <label>Picture</label>
                                    <input class="au-input au-input--full" type="file" name="picture">
                                </div>

                                @error('Picture')
                                    {{$message}}
                                @enderror
                            

                            @error('password')
                                {{$message}}
                            @enderror

                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                            <div class="social-login-content">
                                <div class="social-button">
                                    <button class="au-btn au-btn--block au-btn--blue m-b-20">register with facebook</button>
                                    <button class="au-btn au-btn--block au-btn--blue2">register with twitter</button>
                                </div>
                            </div>
                        </form>
                        <div class="register-link">
                            <p>
                                Already have account?
                                <a href="{{ route('supplier.loginPage') }}">Sign In</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection