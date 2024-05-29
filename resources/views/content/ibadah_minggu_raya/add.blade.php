@extends('layout.main')
@section('judul','Tambah Data Ibadah Minggu Raya')

@section('content')
    <form method="post" action="{{url('mingguraya/insert')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="pelayanan">Pelayanan</label>
                            <textarea name="pelayanan" class="form-control @error('pelayanan') is-invalid @enderror">{{ old('pelayanan') }}</textarea>
                            @error('pelayanan')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ibadah_raya1">Ibadah Minggu Raya 1</label>
                            <input type="datetime-local" name="ibadah_raya1" class="form-control @error('ibadah_raya1') is-invalid @enderror" value="{{ old('ibadah_raya1') }}">
                            @error('ibadah_minggu_raya1')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ibadah_raya2">Ibadah Minggu Raya 2</label>
                            <input type="datetime-local" name="ibadah_raya2" class="form-control @error('ibadah_raya2') is-invalid @enderror" value="{{ old('ibadah_raya2') }}">
                            @error('ibadah_raya2')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('js')

@endpush