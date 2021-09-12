@extends('layouts.user', ['title' => 'Apache Surf'])

@section('content')
{{-- <div class="page-content">
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
            <form action="{{ route('checkout') }}" method="post" >
                 @csrf
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 mx-auto">
                  <div class="form-inline justify-content-between">
                    <p>Nama Kelas</p>
                    <p>{{ $kelas->name }}</p>
                    <input type="hidden" value="{{$kelas->name}}" />
                    <input type="hidden" value="{{$kelas->id}}" name="kelas_id" />
                  </div>
                  <div class="form-inline justify-content-between">
                    <p>Durasi</p>
                    <p>{{ $data['duration']}} Hari</p>
                    <input type="hidden" name="durasi" value="{{ $data['duration']}}"  />
                    <input type="hidden" name="kedatangan" value="{{ $data['kedatangan']}}"  />
                  </div>
                  <div class="form-inline justify-content-between">
                    <p>Total Biaya</p>
                    <p>{{ moneyFormat($data['total_harga']) }}</p>
                    <input type="hidden" name="total_harga" value="{{ $data['total_harga'] }}" />
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 mx-auto">
                  <div class="form-inline justify-content-between">
                    <p>Nama</p>
                    <p>{{ Auth::user()->name }}</p>
                  </div>
                  <div class="form-inline justify-content-between">
                    <p>No Hp</p>
                    <p>{{ Auth::user()->phone }}</p>
                  </div>
                  <div class="form-inline justify-content-between">
                    <p>E-mail</p>
                    <p>{{ Auth::user()->email }}</p>
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
                    <button class="btn btn-join w-100" type="submit">Bayar</button>
                </div>
                <div
                  class="
                    col-lg-4 col-md-6 col-sm-12 col-xs-12
                    mx-auto
                    text-center
                    ml-auto
                  "
                >
                  <a
                    class="btn btn-started w-100"
                    style="background-color: #ccccccb4"
                    href="{{ route('detail', $kelas->slug) }}"
                  >
                    Cancel
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div> --}}
<div class="page-content">
  <section class="class-surf my-4">
    <div class="container">
      <form action="{{ route('checkout') }}" method="post" >
                 @csrf
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
                     <p>{{ $kelas->name }}</p>
                    <input type="hidden" value="{{$kelas->name}}" />
                    <input type="hidden" value="{{$kelas->id}}" name="kelas_id" />
                </div>
                <div class="form-inline justify-content-between">
                  <p>Kedatangan</p>
                  <p>{{ $data['kedatangan'] }}</p>
                    <input type="hidden" name="kedatangan" value="{{ $data['kedatangan']}}"  />

                </div>
                <div class="form-inline justify-content-between">
                  <p>Durasi</p>
                  <p>{{ $data['duration'] }} hari</p>
                    <input type="hidden" name="durasi" value="{{ $data['duration']}}"  />

                </div>
                <div class="form-inline justify-content-between">
                  <p>Total Biaya</p>
                  <p>{{ moneyFormat( $data['total_harga']) }}</p>
                    <input type="hidden" name="total_harga" value="{{ $data['total_harga'] }}" />

                </div>
                 <div class="form-inline justify-content-between">
                  <p>Status Pembayaran</p>
                 

                      <p class="font-weight-bold ">Belum Lunas</p>
                 
                </div>
               
                <div class="form-inline justify-content-between">
                  <p>Nama Lengkap</p>
                  <p>{{ Auth::user()->name }}</p>

                </div>
                <div class="form-inline justify-content-between">
                  <p>No hp</p>
                  <p>{{ Auth::user()->phone }}</p>
                </div>
                <div class="form-inline justify-content-between">
                  <p>E-mail</p>
                  <p>{{ Auth::user()->email }}</p>
                </div>
              </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-sm-3 mb-xs-3">
                  <div class="component-products">
                    <div class="mx-auto my-3 text-center ml-auto">
                      <button type="submit"  class="btn btn-join w-100">
                        Checkout
                      </button>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-sm-3 mb-xs-3">
                  <div class="mx-auto my-3 text-center ml-auto">
                     <a
                    class="btn btn-started w-100"
                    style="background-color: #ccccccb4"
                    href="{{ route('detail', $kelas->slug) }}"
                  >
                    Cancel
                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
  </section>
</div>
@endsection