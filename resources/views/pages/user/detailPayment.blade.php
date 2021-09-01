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
                  <p>Beginer</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>Kedatangan</p>
                  <p>1-9-2021</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>Durasi</p>
                  <p>3 hari</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>Total Biaya</p>
                  <p>Rp. 750.000</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>Nama Lengkap</p>
                  <p>Daniel</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>No hp</p>
                  <p>0858489409590</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>E-mail</p>
                  <p>daniel@gmail.com</p>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 mx-auto">
                <div class="form-inline justify-content-between">
                  <p>Nama</p>
                  <p>Daniel</p>
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
                  <p>Belum Lunas</p>
                  <small>Segera melakukan pembayaran</small>
                </div>
                <div
                  class="
                    form-inline
                    justify-content-between
                    font-weight-bold
                  "
                >
                  <p>Belum Lunas</p>
                  <small>Segera melakukan pembayaran</small>
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