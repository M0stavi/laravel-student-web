@extends('layout')
@section('title', 'Messages')

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
    
        <form  class="ms-auto me-auto mt-auto" style="width:400px">
        <div class="mb-3">
        <h1>Recent Messages</h1>
        
        
    <ul>
        @foreach ($messages as $post)
            <ul><h3>{{ $post->firstname }} wrote: {{ $post->help }} Updated:{{ $post->updated_at->diffForHumans()}}</h3></ul>
            
            
        @endforeach
            </ul>
        </div>
</form>
    
    
@endsection()