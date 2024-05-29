@extends('layout.main')
@section('judul','Ubah Data Ibadah Minggu Raya')

@section('content')
    <form method="POST" action="{{ url('mingguraya/update') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="pelayanan">Pelayanan</label>
                            <input type="text" class="form-control @error('pelayanan') is-invalid @enderror" value="{{ $ibadahMingguRaya->pelayanan }}" name="pelayanan">
                            @error('pelayanan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ibadah_raya1">Ibadah Raya 1</label>
                            <input type="text" class="form-control @error('ibadah_raya1') is-invalid @enderror" value="{{ $ibadahMingguRaya->ibadah_raya1 }}" name="ibadah_raya1">
                            @error('ibadah_raya1')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ibadah_raya2">Ibadah Raya 2</label>
                            <input type="text" class="form-control @error('ibadah_raya2') is-invalid @enderror" value="{{ $ibadahMingguRaya->ibadah_raya2 }}" name="ibadah_raya2">
                            @error('ibadah_raya2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <input type="hidden" name="id" value="{{ $ibadahMingguRaya->id }}">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('js')

@endpush
