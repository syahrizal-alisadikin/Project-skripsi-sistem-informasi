@extends('layouts.admin', ['title' => 'Dashboard'])

@section('content')
 <main>
        <div class="container-fluid">
            
           <div class="row">
               <div class="col-md-6">
                    <div class="card">
                        
                        <div class="card-body">
                            <h4 class="text-center">Update Peserta</h4>
                            <form action="{{route('peserta.update',$peserta->peserta_id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" readonly value="{{ $peserta->peserta->user->name }}" id="name" name="name" placeholder="Masukan Name Materi" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                                <div class="form-group">
                                    <label for="name">Kelas</label>
                                    <select name="kelas" class="form-control" id="">
                                        <option value="{{ $peserta->peserta->kelas->id }}">{{ $peserta->peserta->kelas->name }}</option>
                                        @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            
                                        @endforeach
                                    </select>
                                     
                                </div>
                                <div class="form-group">
                                    <label for="name">Duration</label>
                                    <select name="durasi" class="form-control" id="">
                                        <option value="{{ $peserta->peserta->durasi }}">{{ $peserta->peserta->durasi }}hr</option>
                                        <option value="1">1hr</option>
                                        <option value="2">2hr</option>
                                        <option value="3">3hr</option>
                                        <option value="4">4hr</option>
                                        <option value="5">5hr</option>
                                        <option value="6">6hr</option>
                                        <option value="7">7hr</option>
                                    </select>
                                     
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