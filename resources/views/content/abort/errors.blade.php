@extends('layout.main')
@section('judul','Data Users')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">403 Forbidden</h1>
                        <p class="text-center">Anda bukan admin.</p>
                        <div class="text-center mt-4">
                            <a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection