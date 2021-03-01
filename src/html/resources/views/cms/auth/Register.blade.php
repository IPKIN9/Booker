@extends('cms.layouts.auth.TempLogin')
@section('content')
<form action="{{ route('authregist') }}" method="post">
    @csrf
        @if (session('status'))
            <div class="text-danger">
              {{ session('status') }}
            </div>
        @endif
    <div>
        <div class="form-group">
            <label for="username">name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="password" class="form-control form-control-user" name="password" required autocomplete="new-password" placeholder="Password">
              @error('password')
                <div class="text-danger mt-2 ml-3 small">
                  <span>{{ $message }}</span>
                </div>
              @enderror
            </div>
            <div class="col-sm-6">
              <input type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi Password">
            </div>
          </div>

        <button type="submit">Register</button>
    </div>
</form>
@endsection