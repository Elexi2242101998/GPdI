@extends('layout.main')
@section('judul','Data Users')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-2" href="{{url('/user/add')}}">Tambah Data Users</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Umur</th>
                                <th>Sebagai</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = (($users->currentPage() -1)* $users->perPage())+1;
                            @endphp
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->alamat}}</td>
                                    <td>{{$user->no_telepon}}</td>
                                    <td>{{$user->age}} Tahun</td>
                                    <td>{{$user->role}}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm"
                                           href="{{url('user/edit/'.$user->id)}}">
                                            <i class="fas fa-edit  "></i>
                                        </a>
                                        <button type="button"
                                                data-id-user="{{$user->id}}"
                                                data-name="{{$user->name}}"
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
                                {{$users->firstItem()}}
                                to
                                {{$users->lastItem()}}
                                of
                                {{$users->total()}}
                                entries
                            </div>
                            <div class="ml-auto">
                                {{$users->links()}}
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
                let idUser = $(this).data('id-user');
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
                            url: '/user/delete',
                            type: 'POST',
                            data: {
                                _token: '{{csrf_token()}}',
                                id: idUser
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
