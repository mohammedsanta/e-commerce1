@extends('admin.index')


@section('content')

<div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('admin.change') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input class="au-input au-input--full" type="password" name="old" placeholder="Old Password">
                                </div>

                                
                                @error('old')
                                    {{$message}}
                                @enderror

                                <div class="form-group">
                                    <label>New Password</label>
                                    <input class="au-input au-input--full" type="password" name="new" placeholder="New Password">
                                </div>

                                
                                @error('new')
                                    {{$message}}
                                @enderror

                                <div class="form-group">
                                    <label>Password Confirmation</label>
                                    <input class="au-input au-input--full" type="password" name="password_confirmation" placeholder="Password Confirmation">
                                </div>

                                
                                @error('password_confirmation')
                                    {{$message}}
                                @enderror

                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Change</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection