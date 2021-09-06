@extends('layouts.user', ['title' => 'Apache Surf'])

@section('content')
<div class="page-content">
  <section class="class-surf my-4">
    <div class="container">
      <div class="row">
        <div class="col-12 card" style="background-color: #f3f3f3">
          <div class="card-body">
            <div class="nama-class">
              <h2 class="font-weight-bold mx-auto text-center mb-4">
                Detail Pemesanan Kelas
              </h2>
            </div>
            <div class="row">
              <div
                class="
                  col-lg-4 col-md-4 col-sm-6 col-xs-6
                  mx-auto
                  font-weight-bold
                "
              >
                <div class="form-inline justify-content-between">
                  <p>Nama Kelas</p>
                  <p>{{ $peserta->kelas->name }}</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>Kedatangan</p>
                  <p>{{ $peserta->kedatangan }}</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>Durasi</p>
                  <p>{{ $peserta->durasi }} hari</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>Total Biaya</p>
                  <p>{{ moneyFormat($peserta->transaction->total_harga) }}</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>Nama Lengkap</p>
                  <p>{{ $peserta->user->name }}</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>No hp</p>
                  <p>{{ $peserta->user->phone }}</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>E-mail</p>
                  <p>{{ $peserta->user->email }}</p>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 mx-auto">
                <div class="form-inline justify-content-between">
                  <p>Nama</p>
                  <p>{{ $peserta->user->name }}</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>Status Pembayaran</p>
                </div>
                <div
                  class="
                    form-inline
                    justify-content-between
                    font-weight-bold
                  "
                >
                  @if ($peserta->transaction->status == "SUCCESS")
                      <p>Lunas</p>
                  @else
                      <p>Belum Lunas</p>
                  <small>Segera melakukan pembayaran</small>
                  @endif
                </div>
               
                <div
                  class="
                    form-inline
                    justify-content-between
                    font-weight-bold
                  "
                >
                  <p>DGWUIG1809484</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>Upload Pembayaran</p>
                </div>
                <div class="form-inline justify-content-between">
                  <input type="file" />
                </div>
                <div class="component-products">
                  <div class="mx-auto my-3 text-center ml-auto">
                    <button class="btn btn-join w-100">Upload File</button>
                  </div>
                  <div class="mx-auto text-center ml-auto">
                    <button
                      class="btn btn-started w-100"
                      style="background-color: #e7e6e6b4"
                    >
                      Cancel
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection