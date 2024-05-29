@extends('layout')
@section('title', 'Assignment')

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
    @if(auth()->user()->profile && auth()->user()->profile->role == 'teacher')
    <form action="{{route('assignment.post')}}" method="POST" enctype="multipart/form-data" class="ms-auto me-auto mt-auto" style="width:400px">
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><Caption>Title</label>
            <input  class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><Caption>Link</label>
            <input  class="form-control" id="exampleInputEmail1" name="link" aria-describedby="emailHelp">
        </div>
        
            
                
        <button type="submit" class="btn btn-primary">Upload</button>
          
        </form>
        <form  class="ms-auto me-auto mt-auto" style="width:400px">
        
</form>
@endif

<div class="ms-auto me-auto mt-auto" style="width:400px">
    <h1>Recent Assignments</h1>
    <ul>
        @foreach ($assignments as $post)
            <ul>
                <h3>{{ $post->teacherName }} uploaded: {{ $post->title }} </h3>
                <h1> <a href={{ $post->link }}>Assignment link</a> </h1>
            </ul>

            
        @endforeach
    </ul>
</div>
    
    
@endsection()