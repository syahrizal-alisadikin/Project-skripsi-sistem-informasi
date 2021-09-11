@extends('layouts.user', ['title' => 'Apache Surf'])

@section('content')
<div class="page-content">
  <section class="class-surf my-4">
    <div class="container">
      <div class="row">
        <div class="col-10 mx-auto card" style="background-color: #f3f3f3">
          <div class="card-body">
          <div style="position: absolute; top: 0; right:0">
            {{-- <span><i class="mdi mdi-receipt"><i/></span> --}}
          </div>
            <div class="nama-class">
            <div class="col-lg-5 mx-auto">
              <h2 class="font-weight-bold mx-auto text-center mb-4">
                Detail Pemesanan Kelas
              </h2>
              </div>
            </div>
            <form action="{{ route('checkout') }}" method="post" >
                 @csrf
              <div class="row">
              <div class="col-2"></div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mr-auto font-weight-bold">
                  <div class="form-inline " >
                    <p>Nama Kelas</p>
                    <p class="ml-5">{{ $kelas->name }}</p>
                    <input type="hidden" value="{{$kelas->name}}" />
                    <input type="hidden" value="{{$kelas->id}}" name="kelas_id" />
                  </div>
                  <div class="form-inline" >
                    <p>Kedatangan</p>
                    <p style="margin-left: 6rem">{{ $kelas->kedatangan }}</p>
                    <input type="hidden" value="{{$kelas->kedatangan  }}" name="kelas_id" />
                  </div>
                  <div class="form-inline">
                    <p>Durasi</p>
                    <p style="margin-left: 6rem">{{ $data['duration']}} Hari</p>
                    <input type="hidden" name="durasi" value="{{ $data['duration']}}"  />
                    <input type="hidden" name="kedatangan" value="{{ $data['kedatangan']}}"  />
                  </div>
                  <div class="form-inline">
                    <p>Total Biaya</p>
                    <p style="margin-left: 3.5rem">Rp. {{ $data['total_harga'] }}</p>
                    <input type="hidden" name="total_harga" value="{{ $data['total_harga'] }}" />
                  </div>
                  <div class="form-inline">
                    <p>Status</p>
                    <p style="margin-left: 5.9rem">Lunas</p>
                    <input type="hidden" name="total_harga" value="Lunas" />
                  </div>
                  <div class="form-inline">
                    <p>Nama</p>
                    <p style="margin-left: 6rem">{{ Auth::user()->name }}</p>
                  </div>
                  <div class="form-inline">
                    <p>No Hp</p>
                    <p style="margin-left: 6.1rem">{{ Auth::user()->phone }}</p>
                  </div>
                  <div class="form-inline">
                    <p>E-mail</p>
                    <p style="margin-left: 5.8rem">{{ Auth::user()->email }}</p>
                  </div>
                </div>
              </div>
              <div class="row mt-4 component-products">
                <div
                  class="
                    col-lg-3 col-md-6 col-sm-12 col-xs-12
                    ml-auto
                    text-center
                  "
                >
                    <button class="btn btn-join w-100" type="submit">Bayar</button>
                </div>
                <div
                  class="
                    col-lg-3 col-md-6 col-sm-12 col-xs-12
                    mx-auto
                    text-center
                  "
                >
                  <a
                    class="btn btn-started w-100 text-white"
                    style="background-color: #117a8b"
                    href=""{{ route('detail', $kelas->slug) }}"
                  >
                    Edit
                  </a>
                </div>
                <div
                  class="
                    col-lg-3 col-md-6 col-sm-12 col-xs-12
                    mr-auto
                    text-center
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
</div>
@endsection