@extends('layouts.admin', ['title' => 'Dashboard'])

@section('content')
 <main>
        <div class="container-fluid">
            
           <div class="row">
               <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('transaction.update',$transaction->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <select name="name" class="form-control" id="">
                                        <option value="{{ $transaction->peserta_id }}">{{ $transaction->peserta->user->name }}</option>
                                    </select>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>

                                

                                <div class="form-group">
                                    <label for="name">Duration</label>
                                    <select name="type" class="form-control" id="">
                                        <option value="{{ $transaction->peserta->durasi }}">{{ $transaction->peserta->durasi }}Hr</option>
                                        
                                    </select>
                                     
                                </div>
                                 
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" class="form-control" value="{{ old("total_harga",$transaction->total_harga) }}" required name="total_harga" placeholder="Masukan Harga">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" id="">
                                        <option value="PENDING" {{ $transaction->status == "PENDING" ? 'selected' : '' }}>PENDING</option>
                                        <option value="SUCCESS" {{ $transaction->status == "SUCCESS" ? 'selected' : '' }}>SUCCESS</option>
                                        <option value="CANCELLED" {{ $transaction->status == "CANCELLED" ? 'selected' : '' }}>CANCELLED</option>
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Transaction</button>

                                </div>
                            </form>
                        </div>
                    </div>
               </div>
           </div>
                            
        </div>
    </main>

    <script>
        ClassicEditor
                .create( document.querySelector( '#description' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
        </script>

@endsection