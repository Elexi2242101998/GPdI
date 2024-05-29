@extends('layout.main')
@section('judul','Ubah Sekolah Minggu')

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
    <form method="POST" action="{{url('sekolahminggu/update')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Pelayanan</label>
                            <input type="text"
                                   class="form-control @error('pelayanan') is-invalid @enderror"
                                   value="{{$sekMing->pelayanan}}"
                                   name="pelayanan">
                            @error('pelayanan')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Mdya</label>
                            <input type="text"
                                   class="form-control @error('mdya') is-invalid @enderror"
                                   value="{{$sekMing->mdya}}"
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
                                   value="{{$sekMing->pratama}}"
                                   name="pratama">
                            @error('pratama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <input type="hidden" name="id" value="{{$sekMing->id}}">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('js')

@endpush