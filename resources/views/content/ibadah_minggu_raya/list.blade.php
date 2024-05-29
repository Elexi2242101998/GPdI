@extends('layout.main')
@section('judul','Data Ibadah Minggu Raya')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-2" href="{{url('/mingguraya/add')}}">Tambah Data Ibadah Minggu Raya</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Pelayanan</th>
                                <th>Ibadah Minggu Raya 1</th>
                                <th>Ibadah Minggu Raya 2</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = (($ibadahMingguRaya->currentPage() -1)* $ibadahMingguRaya->perPage())+1;
                            @endphp
                            @foreach($ibadahMingguRaya as $row)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$row->pelayanan}}</td>
                                    <td>{{$row->ibadah_raya1}}</td>
                                    <td>{{$row->ibadah_raya2}}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm"
                                           href="{{url('mingguraya/edit/'.$row->id)}}">
                                            <i class="fas fa-edit  "></i>
                                        </a>
                                        <button type="button"
                                                data-id-raya="{{$row->id}}"
                                                data-name="{{$row->pelayanan}}"
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
                                {{$ibadahMingguRaya->firstItem()}}
                                to
                                {{$ibadahMingguRaya->lastItem()}}
                                of
                                {{$ibadahMingguRaya->total()}}
                                entries
                            </div>
                            <div class="ml-auto">
                                {{$ibadahMingguRaya->links()}}
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
                let idRaya = $(this).data('id-raya');
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
                            url: '/mingguraya/delete',
                            type: 'POST',
                            data: {
                                _token: '{{csrf_token()}}',
                                id: idRaya
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
