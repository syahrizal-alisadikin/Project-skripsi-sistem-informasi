@extends('layouts.admin', ['title' => 'Dashboard'])

@section('content')
 <main>
        <div class="container-fluid">
            
           <div class="row">
               <div class="col-md-6">
                    <div class="card">
                        
                        <div class="card-body">
                            <h4 class="text-center">Update user</h4>
                            <form action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" id="name" name="name" placeholder="Masukan Name user"  required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                                <div class="form-group">
                                    <label for="name">Phone</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $user->phone) }}" name="phone" placeholder="Masukan Phone user"  required>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}"  name="email" placeholder="Masukan Email user"  required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                                 <div class="form-group">
                                    <label for="tinggi_badan">Tinggi Badan</label>
                                    <input type="number" class="form-control @error('tinggi_badan') is-invalid @enderror" value="{{ old('tinggi_badan',$user->tinggi_badan) }}" id="tinggi_badan" name="tinggi_badan" placeholder="contoh : 170 "  required>
                                    @error('tinggi_badan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                                 <div class="form-group">
                                    <label for="tinggi_badan">Berat Badan</label>
                                    <input type="number" class="form-control @error('berat_badan') is-invalid @enderror" value="{{ old('berat_badan',$user->berat_badan) }}" id="berat_badan" name="berat_badan" placeholder="contoh : 50"  required>
                                    @error('berat_badan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                                 <div class="form-group">
                                    <label for="umur">Umur</label>
                                    <input type="number" class="form-control @error('umur') is-invalid @enderror" value="{{ old('umur',$user->umur) }}" id="umur" name="umur" placeholder="contoh : 50"  required>
                                    @error('berat_badan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                                <div class="form-group">
                                    <label for="name">Roles</label>
                                    <select name="roles" class="form-control" id="">
                                        @if ($user->roles == "ADMIN")
                                            <option value="ADMIN" selected>ADMIN</option>
                                            <option value="USER">USER</option>
                                        @else
                                            <option value="USER"selected>USER</option>
                                            <option value="ADMIN" >ADMIN</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password" placeholder="Masukan Password user"  >
                                      @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                                 <div class="form-group">
                                    <label for="name">Confirm Password</label>
                                    <input type="password" class="form-control"  name="password_confirmation" placeholder="Masukan Password user"  >
                                     
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