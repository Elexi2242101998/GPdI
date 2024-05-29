@extends('frontend.layout.main')

@section('content')
<section class="single-page-header"
style="background-image: url({{ asset('assets-fe/assets/theme/images/about/gambarsek1.png') }});">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Schedule</h2>
        </div>
    </div>
</div>
</section>

    <section class="intro">
        <div class="bg-image h-100" style="background-image: url({{ asset('assets-fe/assets/theme/images/kertas.jpg') }});">
          <div class="mask d-flex align-items-center h-100">
            <div class="container">
                <div class="col-md-6" style="padding: 30px;">
                    <h1 style="font-size: 34px; font-weight: bold; padding: 10px; color: #134A6D;">Ibadah Raya</h1> </div>
              <div class="row justify-content-center">
                <div class="col-12">
                  <div class="card mask-custom">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-borderless text-black mb-0">
                          <thead>
                            <tr>
                              <th scope="col">PELAYANAN</th>
                              <th scope="col">IBADAH RAYA I</th>
                              <th scope="col">IBADAH RAYA II</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">Worship Leader</th>
                              <td>Naomi</td>
                              <td>Naomi</td>
                            </tr>
                            <tr>
                              <th scope="row">Singers</th>
                              <td>Joko Dan Jaki</td>
                              <td>Jika Dan Jika</td>
                            </tr>
                            <tr>
                              <th scope="row">Penari Tamborin</th>
                              <td>shelyn, Dimas, Dan Tedis</td>
                              <td>Gabriel, Tedis, Dan Tedis</td>
                            </tr>
                            <tr>
                              <th scope="row">Keyboardis</th>
                              <td>Elexi</td>
                              <td>Falen</td>
                            </tr>
                            <tr>
                              <th scope="row">Gitaris</th>
                              <td>Dimas, Naomi</td>
                              <td>Pak Eka, Bu Yuan</td>
                            </tr>
                            <tr>
                              <th scope="row">Bassits</th>
                              <td>Elexi, Tedis</td>
                              <td>Dimas, Naomi</td>
                            </tr>
                            <tr>
                              <th scope="row">Drummer</th>
                              <td>Dimas, Tedis</td>
                              <td>Pak Dino, Gabriel</td>
                            </tr>
                            <tr>
                                <th scope="row">Pelayan Persembahan</th>
                                <td>Gabriel, Tedis</td>
                                <td>Naomi, Falensia</td>
                              </tr>
                              <tr>
                                <th scope="row">Front Greater</th>
                                <td>Pak Bastaman, Pak Eka</td>
                                <td>Gabriel, Rekarius</td>
                              </tr>
                              <tr>
                                <th scope="row">Doa Syafaat</th>
                                <td>Pak Binuko, Tedis </td>
                                <td>Gabriel, Jiro</td>
                              </tr>
                              <tr>
                                <th scope="row">Perjamuan Kudus</th>
                                <td>Dimas, Falensia</td>
                                <td>Pak Dino, Pak Bastaman</td>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="intro">
        <div class="bg-image h-100" style="background-image: url({{ asset('assets-fe/assets/theme/images/kertas.jpg') }});">
          <div class="mask d-flex align-items-center h-100">
            <div class="container">
                <div class="col-md-6" style="padding: 30px;">
                    <h1 style="font-size: 34px; font-weight: bold; padding: 10px; color: #134A6D;">Sekolah Minggu</h1> </div>
              <div class="row justify-content-center">
                <div class="col-12">
                  <div class="card mask-custom">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-borderless text-black mb-0">
                          <thead>
                            <tr>
                              <th scope="col">PELAYANAN</th>
                              <th scope="col">PRATAMA</th>
                              <th scope="col">MADYA</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">Worship Leader</th>
                              <td>Naomi</td>
                              <td>Naomi</td>
                            </tr>
                            <tr>
                              <th scope="row">PEMUSIK</th>
                              <td>Joko Dan Jaki</td>
                              <td>Jika Dan Jika</td>
                            </tr>
                            <tr>
                              <th scope="row">Pemberi Firman</th>
                              <td>shelyn, Dimas, Dan Tedis</td>
                              <td>Gabriel, Tedis, Dan Tedis</td>
                            </tr>
                            <tr>
                              <th scope="row">Kolektan</th>
                              <td>Elexi</td>
                              <td>Falen</td>
                            </tr>
                            <tr>
                              <th scope="row">Pengawas</th>
                              <td>Dimas, Naomi</td>
                              <td>Pak Eka, Bu Yuan</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
