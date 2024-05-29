@extends('layout.main')
@section('judul','Data Jadwal Ibadah Pelayanan')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-2" href="{{url('/jadwalpelayanan/add')}}">Tambah Data Jadwal Ibadah Pelayanan</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = (($jadwalpelayanan->currentPage() -1)* $jadwalpelayanan->perPage())+1;
                            @endphp
                            @foreach($jadwalpelayanan as $row)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{route('storage',$row->gambar)}}" width="50px" height="50px"></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm"
                                           href="{{url('jadwalpelayanan/edit/'.$row->id)}}">
                                            <i class="fas fa-edit  "></i>
                                        </a>
                                        <button type="button"
                                                data-id-jadwal="{{$row->id}}"
                                                data-name="{{$row->gambar}}"
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
                                {{$jadwalpelayanan->firstItem()}}
                                to
                                {{$jadwalpelayanan->lastItem()}}
                                of
                                {{$jadwalpelayanan->total()}}
                                entries
                            </div>
                            <div class="ml-auto">
                                {{$jadwalpelayanan->links()}}
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
                let idJadPel = $(this).data('id-jadwal');
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
                            url: '/jadwalpelayanan/delete',
                            type: 'POST',
                            data: {
                                _token: '{{csrf_token()}}',
                                id: idJadPel
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
