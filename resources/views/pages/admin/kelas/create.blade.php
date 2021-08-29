@extends('layouts.admin', ['title' => 'Dashboard'])

@section('content')
 <main>
        <div class="container-fluid">
            
           <div class="row">
               <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('kelas.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan Name Kelas" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>

                                <div class="form-group">
                                    <label for="name">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="name" name="image" required>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>

                                <div class="form-group">
                                    <label for="name">Type</label>
                                    <select name="type" class="form-control" id="">
                                        <option value="Kelas Pemula">Kelas Pemula</option>
                                        <option value="Kelas Menengah">Kelas Menengah</option>
                                        <option value="Kelas Advance">Kelas Advance</option>
                                    </select>
                                     
                                </div>

                                 <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description"  id="description" class="form-control @error('description') is-invalid @enderror"  placeholder="Masukan Description" >{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Materi</label>
                                    <select  class="form-control" name="materi[]" id="materi" multiple="multiple">
                                        @foreach ($materi as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            
                                        @endforeach
                                    </select>
                                     
                                </div>
                                 <div class="form-group">
                                    <label for="name">Includes</label>
                                    <select name="includes[]" class="form-control" id="includes" multiple="multiple" >
                                        @foreach ($includes as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            
                                        @endforeach
                                    </select>
                                     
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
<script>       
 $('#includes,#materi').select2({
  placeholder: 'Pilih Data',
  
});</script>
@endsection