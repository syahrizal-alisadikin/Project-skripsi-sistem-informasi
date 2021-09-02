@extends('layouts.user', ['title' => 'Apache Surf'])

@section('content')
    <div class="page-content">
      <section class="class-surf my-4">
        <div class="container">
          <div class="row">
            <div
              class="col-lg-8 col-md-8 col-sm-12 col-xs-12 card"
              style="background-color: #f3f3f3"
            >
              <div class="card-body">
                <div class="nama-class">
                  <h4 class="font-weight-bold">{{$kelas->name}}</h4>
                  <p>{{$kelas->type}}</p>
                </div>
                <img
                  src="{{Storage::url($kelas->image)}}"
                  class="img-fluid rounded"
                />
                <div class="desc-class text-justify mt-4">
                  <p>
                    {!! $kelas->description !!}
                  </p>
                </div>
                <div class="benefit-class">
                  <h4 class="font-weight-bold">Pelaran yang di cakup</h4>
                  <div class="row">
                    <div class="col-lg-6">
                  @foreach ($termasuk->includes as $include)
                      <div class="form-group mb-0">
                        <input
                          type="checkbox"
                          checked
                          class="custom-checkbox"
                        />
                        <label>{{dd($include->name)}}</label>
                      </div>
                  @endforeach
                      
                      <div class="form-group mb-0">
                        <input
                          type="checkbox"
                          checked
                          class="custom-checkbox"
                        />
                        <label>Keselamatan</label>
                      </div>
                      <div class="form-group mb-0">
                        <input
                          type="checkbox"
                          checked
                          class="custom-checkbox"
                        />
                        <label>Memilih kondisi selancar yang tepat</label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group mb-0">
                        <input
                          type="checkbox"
                          checked
                          class="custom-checkbox"
                        />
                        <label>Good Teknik</label>
                      </div>
                      <div class="form-group mb-0">
                        <input
                          type="checkbox"
                          checked
                          class="custom-checkbox"
                        />
                        <label>Etika berselancar</label>
                      </div>
                      <div class="form-group">
                        <input
                          type="checkbox"
                          checked
                          class="custom-checkbox"
                        />
                        <label>Putaran Forehand and Backhand</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="include-class mb-5">
                  <h4 class="font-weight-bold">Include</h4>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group mb-0">
                        <input
                          type="checkbox"
                          checked
                          class="custom-checkbox"
                        />
                        <label>2,5 jam/hari</label>
                      </div>
                      <div class="form-group mb-0">
                        <input
                          type="checkbox"
                          checked
                          class="custom-checkbox"
                        />
                        <label>T-shirt</label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group mb-0">
                        <input
                          type="checkbox"
                          checked
                          class="custom-checkbox"
                        />
                        <label>Papan Selancar</label>
                      </div>
                      <div class="form-group mb-0">
                        <input
                          type="checkbox"
                          checked
                          class="custom-checkbox"
                        />
                        <label>Transportation</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mx-auto card h-100"
              style="background-color: #f3f3f3"
            >
              <div class="card-body component-products">
                <div class="nama-class">
                  <h4 class="font-weight-bold">{{$kelas->name}}</h4>
                  <p>{{$kelas->type}}</p>
                </div>
                <div class="form-group">
                  <label>Kedatangan</label>
                  <input type="date" class="form-control" />
                </div>
                <div class="form-group">
                  <label>Duration</label>
                  <select class="form-control">
                    <option>3 hari</option>
                  </select>
                </div>
                <div class="form-group form-inline mb-0">
                  <label>Per/Day</label>
                  <p class="text-right ml-auto mb-0">Rp.{{($kelas->harga)}}</p>
                </div>
                <div class="form-group font-weight-bold form-inline mt-2">
                  <label>Total</label>
                  <p class="text-right ml-auto mb-0"></p>
                </div>
                <a href="{{route('payment')}}">
                  <button class="btn btn-join w-100 shadow">
                    Beli Kelas
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection