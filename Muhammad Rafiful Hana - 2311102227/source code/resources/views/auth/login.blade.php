{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card-brutal">
            <div class="card-header-brutal">
                <h5><i class="fas fa-sign-in-alt" style="color: #c0392b;"></i> Login</h5>
            </div>

            @if ($errors->any())
                <div class="alert-brutal alert-brutal-danger">
                    <i class="fas fa-exclamation-triangle"></i> 
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div style="margin-bottom: 1.2rem;">
                    <label for="email" style="display: block; font-weight: 700; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.3rem;">
                        <i class="fas fa-envelope"></i> Email
                    </label>
                    <input type="email" class="form-control-brutal" id="email" name="email" 
                           value="{{ old('email') }}" placeholder="email@domain.com" required autofocus>
                </div>

                <div style="margin-bottom: 1.2rem;">
                    <label for="password" style="display: block; font-weight: 700; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.3rem;">
                        <i class="fas fa-lock"></i> Password
                    </label>
                    <input type="password" class="form-control-brutal" id="password" name="password" 
                           placeholder="Masukkan password" required>
                </div>

                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                    <label style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; cursor: pointer;">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                        Ingat saya
                    </label>
                </div>

                <div style="display: flex; gap: 1rem; justify-content: space-between; flex-wrap: wrap;">
                    <button type="submit" class="btn-brutal btn-brutal-primary">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                    <a href="{{ route('register') }}" class="btn-brutal">
                        <i class="fas fa-user-plus"></i> Belum punya akun?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection