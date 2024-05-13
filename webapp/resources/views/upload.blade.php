@extends('layout')
@section('title', 'Upload')

@section('content')
<!-- <div class="container">
    <div class="mt-5">
        @if($errors->any())
            <div class="col-12">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            </div>
        @endif
    </div> -->
    
    <form action="{{route('upload.post')}}" method="POST" enctype="multipart/form-data" class="ms-auto me-auto mt-auto" style="width:400px">
        @csrf


    
        <div class="input-group">
            <input type="file" name="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            
        </div>
        
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><Caption>Caption</label>
            <input  class="form-control" id="exampleInputEmail1" name="caption" aria-describedby="emailHelp">
        </div>
        
            
                
                <button type="submit" class="btn btn-primary">Upload</button>
          
        </form>
        <form  class="ms-auto me-auto mt-auto" style="width:400px">
        
</form>
    
    
@endsection()