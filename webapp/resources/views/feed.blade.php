@extends('layout')
@section('title', 'Feed')

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
    <form action="{{route('upload.post')}}" method="POST" class="ms-auto me-auto mt-auto" style="width:400px">
        @csrf
        <div class="input-group">
            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            <button class="btn btn-outline-secondary" name type="button" id="inputGroupFileAddon04">Button</button>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><Caption>Caption</label>
            <input  class="form-control" id="exampleInputEmail1" name="caption" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>

        <div class="mb-3">
        <h1>Reently Posted</h1>
        </form>
    <ul>
        @foreach ($posts as $post)
            <ul><h3>{{ $post->name }} posted Updated:{{ $post->updated_at->diffForHumans()}}</h3></ul>
            <ul><h1>{{ $post->caption }}</h1></ul> 
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group me-2" role="group" aria-label="First group">
                <form action="{{ route('like.post', $post) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Like {{ $post->likes }}</button>
                </form>
            </div>
            
            <div class="btn-group me-2" role="group" aria-label="Second group">
                <form action="{{ route('comment', ['post' => $post->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Comment {{ $post->comments }}</button>
                </form>
            </div>
            <div class="btn-group" role="group" aria-label="Third group">
                
                <button type="button" class="btn btn-info">Share {{ $post->shares }}</button>
                
            </div>
            </div>
        @endforeach
            </ul>
        </div>
    
    
@endsection()