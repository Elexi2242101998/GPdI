@extends('layout.login')

@section('judul', 'Lupa Password')

@section('content')
@error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
    @endif

<p class="login-box-msg">Silahkan Masukan Email Anda</p>
<form action="{{route('password.email')}}" method="post">
    @csrf
    <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
            @error('email') 
            <div class="invalid-feedback">
            {{$message}}
            </div>
             @enderror
      </div>
    <input type="submit" value="request reset password" class="btn btn-primary btn-block">
        <a href="/login" class="btn btn-info btn-block">Kembali</a>
  </form>
@endsection
@push('js')
    
@endpush