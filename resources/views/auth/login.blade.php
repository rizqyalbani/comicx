@extends('layouts.auth')
@section('title' )Login @endsection
@section('content')
<div class="container mt-3">
    <div class="row ">
        <div class="col-md-12">
            
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                
                <div class="form-group text-left">
                    <label for="email" class="text-white">Alamat Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group text-left">
                    <label for="password" class="text-white">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                </div>
                
                {!! NoCaptcha::display() !!}
                @if ($errors->has('g-recaptcha-response'))
                <br>
                    <div class="form-group text-left">
                        <p class="text-danger" role="alert">
                            <strong>Harap centang google captcha</strong>
                        </p>
                    </div>
                @endif
                
                <div class="form-group">
                    <button type="submit" class="btn btn-blue btn-block">
                        {{ __('Login') }}
                    </button>
                    <br>
                    <a class="btn btn-link text-white" href="{{ route('register') }}">
                        Daftar
                    </a>
                    <hr>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                            Lupa Password
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

