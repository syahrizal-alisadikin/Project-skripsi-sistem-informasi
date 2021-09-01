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
                  <tr>
                    <th style="width: 20%">Nama Kelas</th>
                    <th style="width: 20%">Kedatangan</th>
                    <th style="width: 20%">Durasi</th>
                    <th style="width: 20%">Total</th>
                    <th style="width: 20%">Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Surf Beginner</td>
                    <td>1 September 2021</td>
                    <td>3 hari</td>
                    <td>Rp. 750.000</td>
                    <td>Pending</td>
                    <td>
                      <button
                        class="btn btn-started w-100"
                        style="background-color: #ccccccb4"
                      >
                        Detail
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection