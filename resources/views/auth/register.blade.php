@extends('layouts.auth')
@section('title' )Daftar @endsection

@section('content')

<div class="container mt-3">
    <div class="row ">
        <div class="col-md-12">
            <form id="form-register" method="POST" action="{{ route('register') }}">
                @csrf
                
            
                <div class="form-group text-left">
                    <label for="name" class="text-white">Nama</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus id="name">
                    <input type="hidden" name="affiliasi" value="@if(isset($affiliasi)){{$affiliasi}}@endif">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group text-left">
                    <label for="email" class="text-white">Alamat Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="email">
            
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group text-left">
                    <label for="phone" class="text-white">No Telepon</label>
                    <input id="phone" type="text" class="number-format form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" >
            
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group text-left">
                    <label for="password" class="text-white">{{ __('Password') }}</label>
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
                    <button id="btn-register" type="submit" class="btn btn-blue btn-block">
                        Daftar Sekarang
                    </button>
                    <br>
                    {{-- <div class="g-signin2" data-onsuccess="onSignIn"></div>
                    <div class="row">
                        
                            @include('layouts.include.auth.google', array('title'=>'Daftar'))
                        
                    </div> --}}
                    <hr>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link text-white" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                    @endif
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
