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
                  <div class="d-flex">
                    <p>{{$kelas->type}}</p> 
                  <p class="ml-auto">{{$kelas->instruktur->name}}</p> 
                  </div>
                </div>
                <img
                  src="{{$kelas->image}}"
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
                   @foreach ($materies as $materi)
                    <div class="col-lg-6">
                          @if (in_array($materi->id, $kelas->materi()->pluck('id')->toArray()))
                              <div class="form-group mb-0">
                              <input
                                type="checkbox"
                                checked
                                class="custom-checkbox"
                              />
                              <label>{{$materi->name}}</label>
                            </div>
                           @endif
                      </div>
                      @endforeach
                  </div>
                </div>
                <div class="include-class mb-5">
                  <h4 class="font-weight-bold">Include</h4>
                  <div class="row">
                    @foreach ($includes as $include)
                    <div class="col-lg-6">
                          @if (in_array($include->id, $kelas->includes()->pluck('id')->toArray()))
                              <div class="form-group mb-0">
                              <input
                                type="checkbox"
                                checked
                                class="custom-checkbox"
                              />
                              <label>{{$include->name}}</label>
                            </div>
                           @endif
                      </div>
                      @endforeach
                      
                    
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
                  <select class="form-control" onfocus="starthitung()" onblur="hasil()" id="duration">
                    <option value="1">1 hari</option>
                    <option value="2" >2 hari</option>
                    <option value="3">3 hari</option>
                    <option value="4">4 hari</option>
                    <option value="5">5 hari</option>
                    <option value="6">6 hari</option>
                    <option value="7">7 hari</option>
                  </select>
                </div>
                <div class="form-group form-inline mb-0">
                  <label>Per/Day</label>
                  <p class="text-right ml-auto mb-0">Rp.<span id="day" onfocus="starthitung()" onblur="hasil()">{{($kelas->harga)}}</span></p>
                </div>
                <div class="form-group font-weight-bold form-inline mt-2">
                  <label >Total</label>
                  <p class="text-right ml-auto mb-0">Rp.
                    <span id="total">{{ $kelas->harga}}</span>
                  </p>
                </div>
               @guest
                 <a href="{{route('login')}}">
                  <button class="btn btn-join w-100 shadow">
                    Login Or Register
                  </button>
                </a>
               @endguest
               @auth
                <a href="{{route('payment')}}">
                  <button class="btn btn-join w-100 shadow">
                    Beli Kelas
                  </button>
                </a>
               @endauth
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection

@section('addon-script')
<script>
function starthitung(){
    interval = setInterval("hitung()",1);
 }
 function hitung(){
    var duration = parseInt(document.getElementById("duration").value);
    var day = parseInt(document.getElementById("day").innerHTML );
    jumlah = duration * day;
    console.log(jumlah);
    document.getElementById("total").innerHTML  = jumlah;
}
function hasil(){
    clearInterval(interval);
}
</script>
@endsection