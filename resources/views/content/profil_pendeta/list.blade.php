@extends('layout.main')
@section('judul','Data Pendeta')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-2" href="{{url('/profilependeta/add')}}">Tambah Data Profil Pendeta</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>nama pendeta</th>
                                <th>foto pendeta</th>
                                <th>moto</th>
                                <th>instagram</th>
                                <th>whatsapp</th>
                                <th>facebook</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = (($profilPendeta->currentPage() -1)* $profilPendeta->perPage())+1;
                            @endphp
                            @foreach($profilPendeta as $row)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$row->nama_pendeta}}</td>
                                    <td><img src="{{route('storage',$row->foto_pendeta)}}" width="50px" height="50px"></td>
                                    <td>{{$row->moto}}</td>
                                    <td>{{$row->instagram}}</td>
                                    <td>{{$row->whatsapp}}</td>
                                    <td>{{$row->facebook}}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm"
                                           href="{{url('profilependeta/edit/'.$row->id)}}">
                                            <i class="fas fa-edit  "></i>
                                        </a>
                                        <button type="button"
                                                data-id-pendeta="{{$row->id}}"
                                                data-name="{{$row->nama_pendeta}}"
                                                class="btn btn-danger btn-sm btn-hapus">
                                            <i class="fas fa-trash  "></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <div>
                                {{$profilPendeta->firstItem()}}
                                to
                                {{$profilPendeta->lastItem()}}
                                of
                                {{$profilPendeta->total()}}
                                entries
                            </div>
                            <div class="ml-auto">
                                {{$profilPendeta->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(function () {
            $('.btn-hapus').on('click', function () {
                let idPendeta = $(this).data('id-pendeta');
                let name = $(this).data('name');
                Swal.fire({
                    title: "Konfirmasi",
                    text: `Anda yakin hapus data ${name}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/profilependeta/delete',
                            type: 'POST',
                            data: {
                                _token: '{{csrf_token()}}',
                                id: idPendeta
                            },
                            success: function () {
                                Swal.fire('Sukses', 'Data berhasil dihapus', 'success')
                                    .then(function () {
                                        window.location.reload();
                                    })
                            },
                            error: function () {
                                Swal.fire('Gagal', 'Terjadi kesalahan ketika menghapus data Mungkin Anda Bukan Admin', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
