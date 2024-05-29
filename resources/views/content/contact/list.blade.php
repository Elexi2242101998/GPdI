@extends('layout.main')
@section('judul','Data Our Contact')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-2" href="{{url('/contact/add')}}">Tambah Our Contact</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Nomor Telepon</th>
                                <th>Web</th>
                                <th>Instagram</th>
                                <th>Twitter</th>
                                <th>Facebook</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = (($contacts->currentPage() -1)* $contacts->perPage())+1;
                            @endphp
                            @foreach($contacts as $row)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{route('storage',$row->gambar)}}" width="50px" height="50px"></td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->alamat}}</td>
                                    <td>{{$row->no_telp}}</td>
                                    <td>{{$row->web}}</td>
                                    <td>{{$row->instagram}}</td>
                                    <td>{{$row->twitter}}</td>
                                    <td>{{$row->facebook}}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm"
                                           href="{{url('contact/edit/'.$row->id)}}">
                                            <i class="fas fa-edit  "></i>
                                        </a>
                                        <button type="button"
                                                data-id-contact="{{$row->id}}"
                                                data-name="{{$row->id}}"
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
                                {{$contacts->firstItem()}}
                                to
                                {{$contacts->lastItem()}}
                                of
                                {{$contacts->total()}}
                                entries
                            </div>
                            <div class="ml-auto">
                                {{$contacts->links()}}
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
                let idContact = $(this).data('id-contact');
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
                            url: '/contact/delete',
                            type: 'POST',
                            data: {
                                _token: '{{csrf_token()}}',
                                id: idContact
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
