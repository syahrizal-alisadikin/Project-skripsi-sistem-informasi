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
                List Kelas
              </h2>
            </div>
            <div class="col-12">
              <table class="table table-responsive" style="border: 0">
                <thead>
                  <tr class="text-center">
                    <th style="width: 20%">Nama Kelas</th>
                    <th style="width: 20%">Kedatangan</th>
                    <th style="width: 20%">Durasi</th>
                    <th style="width: 20%">Total</th>
                    <th style="width: 20%">Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($peserta as $murid)
                  <tr class="text-center">
                      <td>{{ $murid->kelas->name }}</td>
                      <td>{{ $murid->kedatangan}}</td>
                      <td>{{ $murid->durasi}} Hari</td>
                      {{-- <td>{{ $murid->transaction->total_harga ?? "data di hapus"}}</td> --}}

                      <td>{{ moneyFormat($murid->transaction->total_harga)}}</td>
                      <td>
                      @if ($murid->transaction->status == "SUCCESS")
                                            <span class="badge badge-success">Lunas</span>
                                        @elseif($murid->transaction->status == "PENDING")
                                        <span class="badge badge-warning">Belum Lunas</span>
                                        @else  
                                        <span class="badge badge-danger">Cancel</span>

                                        @endif
                     
                      </td>
                      <td class="d-flex">
                        <a href="{{ route('paymentDetail',$murid->id) }}"
                          class="btn btn-started w-100"
                          style="background-color: #ccccccb4"
                        >
                          Detail
                        </a>
                        @if ($murid->transaction->status == "PENDING")
                             <a href="{{ route('CancelPayment',$murid->id) }}"
                          class="btn btn-started w-100 ml-3"
                          style="background-color: #e60321de; color: white"
                        >
                          Cancel
                        </a>
                        

                        @endif
                      </td>
                    </tr>
                @empty
                    <tr>
                      <td colspan="6" class="text-center"> Belum ada kelas {{ Auth::user()->name }}</td>
                      
                    </tr>
                @endforelse
                  
                </tbody>
              </table>
              
            </div>
          </div>
        </div>
        <div style="text-align: center; margin:auto">
                            {{$peserta->links("vendor.pagination.bootstrap-4")}}
                        </div>
      </div>
    </div>
  </section>
</div>

@include('includes.footer')
@endsection