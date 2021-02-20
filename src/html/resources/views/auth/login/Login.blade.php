@extends('layouts.auth.login.TempLogin')
@section('content')
    <form action="{{ route('authcheck') }}" method="post">
        @csrf
            @if (session('status'))
                <div class="text-danger">
                  {{ session('status') }}
                </div>
            @endif
        <div>
            {{-- <div class="form-group">
                <label for="username">name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> --}}
            
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit">Login</button>
        </div>
    </form>
@endsection