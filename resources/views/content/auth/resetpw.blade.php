@extends('layout.login')

@section('judul', 'login')

@section('content')
<p class="login-box-msg">Masukkan kata sandi baru Anda</p>
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    
    <input type="hidden" name="token" value="{{ request()->token }}">
    <input type="hidden" name="email" value="{{ request()->email }}">

    <div class="form-group">
        <label for="password">Password Baru</label>
        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="password_confirmation">Konfirmasi Password Baru</label>
        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
        @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
</form>
@endsection
@push('js')
    
@endpush