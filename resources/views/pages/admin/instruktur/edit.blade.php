@extends('layouts.admin', ['title' => 'Dashboard'])

@section('content')
 <main>
        <div class="container-fluid">
            
           <div class="row">
               <div class="col-md-6">
                    <div class="card">
                        
                        <div class="card-body">
                            <h4 class="text-center">Update Instruktur</h4>
                            <form action="{{route('instruktur.update',$instruktur->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$instruktur->name) }}" id="name" name="name" placeholder="Masukan Name Materi"  required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>

                                 <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="name" name="email" placeholder="Masukan email Instruktur" value="{{ old('email',$instruktur->email) }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                                <div class="form-group">
                                    <label for="name">Phone</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror" id="name" name="phone" placeholder="Masukan Phone Instruktur" value="{{ old('phone',$instruktur->phone) }}" required>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                                <div class="form-group">
                                    <label for="name">Status</label>
                                    <select name="status" class="form-control" id="">
                                        <option value="Active" {{ $instruktur->status == "Active" ? 'selected' : '' }} >Active</option>
                                        <option value="Inactive" {{ $instruktur->status == "Inactive" ? 'selected' : '' }} >Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Alamat</label>
                                    <textarea name="alamat" id="" class="form-control" cols="30" rows="5" placeholder="Masukan alamat...">{{ old('alamat',$instruktur->alamat) }}</textarea>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                            
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update data</button>

                                </div>
                            </form>
                        </div>
                    </div>
               </div>
           </div>
                            
        </div>
    </main>
@endsection