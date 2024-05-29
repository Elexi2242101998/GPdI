@extends('layout.main')
@section('judul','Tambah Data Our Contact')

@section('content')
    <form method="post" action="{{url('contact/insert')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" 
                            accept="image/*" onchange="tampilkanPreview(this, 'tampilFoto')">
                            @error('gambar')
                            <span style="color:red; font-wight: 600; font-size: 9pt">{{$message}}</span>
                            @enderror
                            <p></p>
                            <img id="tampilFoto" onerror="this.onerror=null; this.src='https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABLN930GwaMQz.jpg'; " src="" alt="" width="15%">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" name="alamat">
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="no_telp">Nomor Telepon</label>
                            <input type="telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{ old('no_telp') }}" name="no_telp">
                            @error('no_telp')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="web">Web</label>
                            <input type="url" class="form-control @error('web') is-invalid @enderror" value="{{ old('web') }}" name="web">
                            @error('web')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="url" class="form-control @error('instagram') is-invalid @enderror" value="{{ old('instagram') }}" name="instagram">
                            @error('instagram')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="url" class="form-control @error('twitter') is-invalid @enderror" value="{{ old('twitter') }}" name="twitter">
                            @error('twitter')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="url" class="form-control @error('facebook') is-invalid @enderror" value="{{ old('facebook') }}" name="facebook">
                            @error('facebook')
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