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
                Payment
              </h2>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 mx-auto">
                <div class="form-inline justify-content-between">
                  <p>Nama Kelas</p>
                  <p>Beginer</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>Durasi</p>
                  <p>3 Hari</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>Total Biaya</p>
                  <p>Rp. 750.000</p>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 mx-auto">
                <div class="form-inline justify-content-between">
                  <p>Nama</p>
                  <p>Daniel</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>No Hp</p>
                  <p>14045</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>E-mail</p>
                  <p>Daniel@14045.com</p>
                </div>
              </div>
            </div>
            <div class="row mt-4 component-products">
              <div
                class="
                  col-lg-4 col-md-6 col-sm-12 col-xs-12
                  mx-auto
                  text-center
                  ml-auto
                "
              >
                <a href="{{route('detailPayment')}}">
                  <button class="btn btn-join w-100">Bayar</button>
                </a>
              </div>
              <div
                class="
                  col-lg-4 col-md-6 col-sm-12 col-xs-12
                  mx-auto
                  text-center
                  ml-auto
                "
              >
                <button
                  class="btn btn-started w-100"
                  style="background-color: #ccccccb4"
                >
                  Cancel
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection