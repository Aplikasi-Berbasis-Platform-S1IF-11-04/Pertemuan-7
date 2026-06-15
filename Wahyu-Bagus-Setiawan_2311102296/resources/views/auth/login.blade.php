@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="row justify-content-center align-items-center" style="min-height:85vh;">

    <div class="col-md-5 col-lg-4">

        <div class="glass-card p-4 p-md-5">

            <div class="text-center mb-4">

                <h1 class="fw-bold mb-2">
                    🔐 Secure Login
                </h1>

                <p class="text-light opacity-75 small">
                    Enterprise Inventory Authentication System
                </p>

            </div>

            @if(session('info'))
                <div class="alert alert-info border-0 small">
                    {{ session('info') }}
                </div>
            @endif

            <form action="{{ route('login.store') }}" method="POST">
                @csrf

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Email Address
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control py-3 @error('email') is-invalid @enderror"
                           placeholder="Masukkan email..."
                           value="{{ old('email') }}"
                           required>

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control py-3"
                           placeholder="Masukkan password..."
                           required>

                </div>

                <button type="submit"
                        class="btn btn-modern w-100 py-3 rounded-pill">
                    Masuk ke Dashboard
                </button>

            </form>

            <div class="text-center mt-4">
                <small class="text-light opacity-75">
                    Laravel Authentication • Session • Middleware
                </small>
            </div>

        </div>

    </div>

</div>

@endsection