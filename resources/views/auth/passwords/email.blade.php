@extends('layouts.auth')
@section('title' )Lupa Password @endsection
@section('content')
<div class="container mt-3">
    <div class="row ">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
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
            
                <div class="form-group">
                    <button type="submit" class="btn btn-blue btn-block">
                        Kirim Link Reset Password
                    </button>
                    
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
