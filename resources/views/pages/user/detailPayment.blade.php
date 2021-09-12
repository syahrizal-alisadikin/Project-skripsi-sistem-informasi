@extends('layouts.user', ['title' => 'Apache Surf'])

@push('')

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
                  <p>Status Pembayaran</p>
                  @if ($peserta->transaction->status == "SUCCESS")
                      <p class="font-weight-bold ">Lunas</p>
                  @elseif($peserta->transaction->status == "PENDING")

                      <p class="font-weight-bold ">Belum Lunas</p>
                  @else
                      <p class="font-weight-bold ">Expired</p>
                  
                  @endif
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
              </div>
              <div class="row justify-content-center">
               @if ($peserta->transaction->status == "SUCCESS")
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-sm-3 mb-xs-3">
                  <div class="component-product">
                    <div class="mx-auto my-3 text-center ml-auto">
                      <a href="javascript:void(0)">
                        <button class="btn btn-join w-100 btn-success">Sudah dibayar</button>
                      </a>
                    </div>
                  </div>
                </div>
               @elseif($peserta->transaction->status == "PENDING")
                   <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-sm-3 mb-xs-3">
                  <div class="component-products">
                    <div class="mx-auto my-3 text-center ml-auto">
                      <a href="{{ $peserta->transaction->snap_token }}"  class="btn btn-join w-100">
                        Checkout
                      </a>
                    </div>
                  </div>
                </div>
                @else
                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-sm-3 mb-xs-3">
                  <div class="component-products">
                    <div class="mx-auto my-3 text-center ml-auto">
                      <a href="javascript:void(0)">
                        <button class="btn btn-join w-100">Expired</button>
                      </a>
                    </div>
                  </div>
                </div>
               @endif
                {{-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-sm-3 mb-xs-3">
                  <div class="component-products">
                    <div class="mx-auto my-3 text-center ml-auto">
                      <a href="{{ route('payment', $peserta->id)}}">
                        <button class="btn btn-info w-100">Edit</button>
                      </a>
                    </div>
                  </div>
                </div> --}}
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-sm-3 mb-xs-3">
                  <div class="mx-auto my-3 text-center ml-auto">
                    <a href="{{ route('class')}}">
                        <button
                          class="btn btn-started w-100"
                          style="background-color: #e7e6e6b4"
                        >
                          Cancel
                        </button>
                      </a>
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