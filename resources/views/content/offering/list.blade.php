@extends('layout.main')
@section('judul','Data Offering')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-2" href="{{url('/offering/add')}}">Tambah Data Offering</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Ayat</th>
                                <th>Persembahan</th>
                                <th>Janji Iman</th>
                                <th>Qris</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = (($offerings->currentPage() -1)* $offerings->perPage())+1;
                            @endphp
                            @foreach($offerings as $row)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$row->ayat}}</td>
                                    <td>{{$row->persembahan}}</td>
                                    <td>{{$row->janji_iman}}</td>
                                    <td><img src="{{route('storage',$row->qris)}}" width="50px" height="50px"></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm"
                                           href="{{url('offering/edit/'.$row->id)}}">
                                            <i class="fas fa-edit  "></i>
                                        </a>
                                        <button type="button"
                                                data-id-offering="{{$row->id}}"
                                                data-name="{{$row->persembahan}}"
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
                                {{$offerings->firstItem()}}
                                to
                                {{$offerings->lastItem()}}
                                of
                                {{$offerings->total()}}
                                entries
                            </div>
                            <div class="ml-auto">
                                {{$offerings->links()}}
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
                let idOffering = $(this).data('id-offering');
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
                            url: '/offering/delete',
                            type: 'POST',
                            data: {
                                _token: '{{csrf_token()}}',
                                id: idOffering
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
