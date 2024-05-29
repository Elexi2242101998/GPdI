@extends('layout.main')
@section('judul','Ubah Data Profil Pendeta')

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
    <form method="POST" action="{{url('profilependeta/update')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="form-label">Nama Pendeta</label>
                            <input type="text"
                                   class="form-control @error('nama_pendeta') is-invalid @enderror"
                                   value="{{ $profilPendeta->nama_pendeta }}"
                                   name="nama_pendeta">
                            @error('nama_pendeta')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="form-label">Foto Pendeta</label>
                            <input type="file" name="foto_pendeta" class="form-control @error('foto_pendeta') is-invalid @enderror" 
                            accept="image/*" onchange="tampilkanPreview(this, 'tampilFotoPendeta')">
                            @error('foto_pendeta')
                            <span style="color:red; font-wight: 600; font-size: 9pt">{{ $message }}</span>
                            @enderror
                            <p></p>
                            <img id="tampilFotoPendeta" onerror="this.onerror=null; this.src='https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABLN930GwaMQz.jpg'; " src="{{ route('storage', $profilPendeta->foto_pendeta) }}" alt="" width="15%">
                        </div>
                        <div class="form-group">
                            <label for="">Moto</label>
                            <input type="text"
                                   class="form-control @error('moto') is-invalid @enderror"
                                   value="{{ $profilPendeta->moto }}"
                                   name="moto">
                            @error('moto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Instagram</label>
                            <input type="url"
                                   class="form-control @error('instagram') is-invalid @enderror"
                                   value="{{ $profilPendeta->instagram }}"
                                   name="instagram">
                            @error('instagram')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">WhatsApp</label>
                            <input type="text"
                                   class="form-control @error('wa') is-invalid @enderror"
                                   value="{{ $profilPendeta->wa }}"
                                   name="wa">
                            @error('wa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Facebook</label>
                            <input type="url"
                                   class="form-control @error('facebook') is-invalid @enderror"
                                   value="{{ $profilPendeta->facebook }}"
                                   name="facebook">
                            @error('facebook')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <input type="hidden" name="id" value="{{$profilPendeta->id}}">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('js')

@endpush