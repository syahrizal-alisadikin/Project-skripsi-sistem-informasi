@extends('layouts.admin', ['title' => 'Dashboard'])

@section('content')
 <main>
        <div class="container-fluid">
            
           <div class="row">
               <div class="col-md-6">
                    <div class="card">
                        
                        <div class="card-body">
                            <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="Masukan Name user"  required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                                <div class="form-group">
                                    <label for="name">Phone</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" placeholder="Masukan Phone user"  required>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"  name="email" placeholder="Masukan Email user"  required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                                <div class="form-group">
                                    <label for="name">Roles</label>
                                    <select name="roles" class="form-control" id="">
                                        
                                            <option value="ADMIN" selected>ADMIN</option>
                                            <option value="USER">USER</option>
                                        
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