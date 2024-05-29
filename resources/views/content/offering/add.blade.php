@extends('layout.main')
@section('judul','Tambah Data Offering')

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
    <form method="post" action="{{url('offering/insert')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Ayat</label>
                            <input type="text"
                                   class="form-control @error('ayat') is-invalid @enderror"
                                   value="{{old('ayat')}}"
                                   name="ayat">
                            @error('ayat')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Persembahan</label>
                            <input type="text"
                                   class="form-control @error('persembahan') is-invalid @enderror"
                                   value="{{old('persembahan')}}"
                                   name="persembahan">
                            @error('persembahan')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Janji Iman</label>
                            <input type="text"
                                   class="form-control @error('janji_iman') is-invalid @enderror"
                                   value="{{old('janji_iman')}}"
                                   name="janji_iman">
                            @error('janji_iman')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="form-label">Gambar Qris</label>
                            <input type="file" name="qris" class="form-control @error('qris') is-invalid @enderror" 
                            accept="image/*" onchange="tampilkanPreview(this, 'tampilFoto')">
                            @error('qris')
                            <span style="color:red; font-wight: 600; font-size: 9pt">{{$message}}</span>
                            @enderror
                            <p></p>
                            <img id="tampilFoto" onerror="this.onerror=null; this.src='https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABLN930GwaMQz.jpg'; " src="" alt="" width="15%">
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