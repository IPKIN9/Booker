@extends('layouts.cms.auth.TempLogin')
@section('content')
    <form action="{{ route('authcheck') }}" method="post">
        @csrf
            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                        <form class="login100-form validate-form">
                            <span class="login100-form-title p-b-33">
                                Copac Login
                            </span>
                            <span style="text-align: center;">
                                @if (session('status'))
                                    <div class="text-danger">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="text-danger">{{$errors->first()}}</div>
                                @endif
                            </span>
                            <br>
                            <div class="wrap-input100 validate-input" data-validate = "Valid username is required: ex@abc.xyz">
                                <input class="input100" type="text" name="username" placeholder="Username" required>
                                <span class="focus-input100-1"></span>
                                <span class="focus-input100-2"></span>
                            </div>
        
                            <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                                <input class="input100" type="password" name="password" placeholder="Password" required>
                                <span class="focus-input100-1"></span>
                                <span class="focus-input100-2"></span>
                            </div>
        
                            <div class="container-login100-form-btn m-t-20">
                                <button class="login100-form-btn" type="submit">
                                    LOGIN
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </form>
@endsection