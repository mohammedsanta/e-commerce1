@extends('supplier.index')

@section('content')
    <div class="box-form">
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
                            <form action="{{ route('supplier.change') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input class="au-input au-input--full" type="password" name="old" placeholder="old">
                                </div>

                                @error('old')
                                    {{$message}}
                                @enderror

                                <div class="form-group">
                                    <label>New Password</label>
                                    <input class="au-input au-input--full" type="password" name="new" placeholder="new">
                                </div>

                                @error('new')
                                    {{$message}}
                                @enderror

                                <div class="form-group">
                                    <label>Password Confirmation</label>
                                    <input class="au-input au-input--full" type="password" name="password_confirmation" placeholder="password confirmation">
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