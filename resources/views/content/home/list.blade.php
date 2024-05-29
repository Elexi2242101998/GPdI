@extends('layout.main')
@section('judul','Data Home')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-2" href="{{url('/home/add')}}">Tambah Data Home</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Link Maps</th>
                                <th>Sunday Services</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = (($homes->currentPage() -1)* $homes->perPage())+1;
                            @endphp
                            @foreach($homes as $home)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{route('storage',$home->gambar)}}" width="50px" height="50px"></td>
                                    <td>{{$home->link_maps}}</td>
                                    <td>{{$home->sunday_service}}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm"
                                           href="{{url('home/edit/'.$home->id)}}">
                                            <i class="fas fa-edit  "></i>
                                        </a>
                                        <button type="button"
                                                data-id-home="{{$home->id}}"
                                                data-name="{{$home->sunday_service}}"
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
                                {{$homes->firstItem()}}
                                to
                                {{$homes->lastItem()}}
                                of
                                {{$homes->total()}}
                                entries
                            </div>
                            <div class="ml-auto">
                                {{$homes->links()}}
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
                let idHome = $(this).data('id-home');
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
                            url: '/home/delete',
                            type: 'POST',
                            data: {
                                _token: '{{csrf_token()}}',
                                id: idHome
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
