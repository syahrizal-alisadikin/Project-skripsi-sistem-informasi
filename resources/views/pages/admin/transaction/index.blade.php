@extends('layouts.admin', ['title' => 'Dashboard'])

@section('content')
<main>
    <div class="container-fluid">
        
        <div class="card mb-4">
            <div class="card-header">
              {{-- <a href="{{ route('materi.create') }}" class="btn btn-success">Tambah Materi</a> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="orders-table" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Name</th>
                                <th>Kelas</th>
                                <th>Duration</th>
                                <th>Bayar</th>
                                <th>Status</th>
                                
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($transactions as $item)
                             <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->peserta->user->name ?? null }}</td>
                                    <td>{{ $item->peserta->kelas->type ?? null }}</td>
                                    <td>{{ $item->peserta->durasi ?? null }}hr</td>
                                    <td>Rp{{ number_format($item->total_harga,0,",",".") }}</td>
                                    <td>
                                        @if ($item->status == "SUCCESS")
                                            <span class="badge badge-success">Lunas</span>
                                        @elseif($item->status == "PENDING")
                                        <span class="badge badge-warning">Belum Lunas</span>
                                        @else  
                                        <span class="badge badge-danger">Cancel</span>

                                        @endif
                                        </td>
                                    <td>
                                         <a href="{{ route('transaction.edit' , $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $item->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                             @if ($item->status == "PENDING")
                             <a href="{{ route('CancelPaymentAdmin',$item->peserta_id) }}"
                          class="btn btn-sm"
                          style="background-color: #e60321de; color: white"
                        >
                          Cancel
                        </a>
                        

                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada data</td>
                                </tr>
                                @endforelse
                        </tbody>


                    </table>
                    <div style="text-align: center;">
                            {{$transactions->links("vendor.pagination.bootstrap-4")}}
                        </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    //ajax delete
    function Delete(id)
        {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "APAKAH KAMU YAKIN ?",
                text: "INGIN MENGHAPUS DATA INI!",
                icon: "warning",
                buttons: [
                    'TIDAK',
                    'YA'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {

                    //ajax delete
                    jQuery.ajax({
                        url: "{{ route("transaction.index") }}/"+id,
                        data:     {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function (response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    icon: 'success',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }else{
                                swal({
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    icon: 'error',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });

                } else {
                    return true;
                }
            })
        }
</script>
@endsection