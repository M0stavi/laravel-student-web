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
    @if(auth()->user()->profile && auth()->user()->profile->role == 'teacher')
    <h1>Student Uploads</h1>
    @else 
    <h1>Your Uploads</h1>
    @endif
    <ul>
        @foreach ($posts as $post)
        @if(auth()->user()->profile && auth()->user()->profile->role == 'teacher')

            <ul><h3>{{ $post->name }} posted Updated:{{ $post->updated_at->diffForHumans()}}</h3></ul>
            <ul><h1>{{ $post->caption }}</h1></ul> 
            @if ($post->content)
                <ul><h1>File name: {{ $post->content }}</h1></ul> 
            @endif
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            
            
            <div class="btn-group me-2" role="group" aria-label="Second group">
                <form action="{{ route('review', ['post' => $post->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Reviews</button>
                </form>
            </div>
            
            </div>
            @else
            @if(auth()->user()->email == $post->email)
            <ul><h3>{{ $post->name }} posted Updated:{{ $post->updated_at->diffForHumans()}}</h3></ul>
            <ul><h1>{{ $post->caption }}</h1></ul> 
            @if ($post->content)
                <ul><h1>File name: {{ $post->content }}</h1></ul> 
            @endif
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            
            
            <div class="btn-group me-2" role="group" aria-label="Second group">
                <form action="{{ route('review', ['post' => $post->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Reviews </button>
                </form>
            </div>
            </div>
            @endif

            @endif
        @endforeach
            </ul>
        </div>
    
    
@endsection()