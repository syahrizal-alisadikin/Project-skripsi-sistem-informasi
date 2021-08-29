@extends('layouts.admin', ['title' => 'Dashboard'])

@section('content')
 <main>
        <div class="container-fluid">
            
           <div class="row">
               <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('includes.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan Name Includes" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                            
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Tambah</button>

                                </div>
                            </form>
                        </div>
                    </div>
               </div>
           </div>
                            
        </div>
    </main>
@endsection