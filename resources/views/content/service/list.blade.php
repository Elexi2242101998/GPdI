@extends('layout.main')
@section('judul','Data Services')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-2" href="{{url('/services/add')}}">Tambah Data Service</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Link Streaming</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = (($services->currentPage() -1)* $services->perPage())+1;
                            @endphp
                            @foreach($services as $service)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{route('storage',$service->gambar)}}" width="50px" height="50px"></td>
                                    <td>{{$service->link_streaming}}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm"
                                           href="{{url('services/edit/'.$service->id)}}">
                                            <i class="fas fa-edit  "></i>
                                        </a>
                                        <button type="button"
                                                data-id-service="{{$service->id}}"
                                                data-name="{{$service->link_streaming}}"
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
                                {{$services->firstItem()}}
                                to
                                {{$services->lastItem()}}
                                of
                                {{$services->total()}}
                                entries
                            </div>
                            <div class="ml-auto">
                                {{$services->links()}}
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
                let idService = $(this).data('id-service');
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
                            url: '/services/delete',
                            type: 'POST',
                            data: {
                                _token: '{{csrf_token()}}',
                                id: idService
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