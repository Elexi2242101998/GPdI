@extends('layout.main')
@section('judul','Tambah Data Sekolah Minggu')

@section('content')
    {{--    @if ($errors->any())--}}
    {{--        <div class="alert alert-danger">--}}
    {{--            <ul>--}}
    {{--                @foreach ($errors->all() as $error)--}}
    {{--                    <li>{{ $error }}</li>--}}
    {{--                @endforeach--}}
    {{--            </ul>--}}
    {{--        </div>--}}
    {{--    @endif--}}
    <form method="post" action="{{url('sekolahminggu/insert')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Pelayanan</label>
                            <input type="text"
                                   class="form-control @error('pelayanan') is-invalid @enderror"
                                   value="{{old('pelayanan')}}"
                                   name="pelayanan">
                            @error('pelayanan')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Madya</label>
                            <input type="text"
                                   class="form-control @error('mdya') is-invalid @enderror"
                                   value="{{old('mdya')}}"
                                   name="mdya">
                            @error('mdya')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Pratama</label>
                            <input type="text"
                                   class="form-control @error('pratama') is-invalid @enderror"
                                   value="{{old('pratama')}}"
                                   name="pratama">
                            @error('sunday_service')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('js')

@endpush