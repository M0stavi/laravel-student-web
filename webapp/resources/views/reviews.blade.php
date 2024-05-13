@extends('layout')
@section('title', 'Reviews')

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
    <div class="mb-3">
    <h1>Your Uploads</h1>
    <ul>
        @foreach ($posts as $post)
            <ul><h3>{{ $post->name }} posted Updated:{{ $post->updated_at->diffForHumans()}}</h3></ul>
            <ul><h1>{{ $post->caption }}</h1></ul> 
            @if ($post->content)
                <ul><h1>File name: {{ $post->content }}</h1></ul> 
            @endif
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