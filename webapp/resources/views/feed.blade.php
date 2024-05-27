@extends('layout')
@section('title', 'Content')

@section('content')

<form action="{{ route('upload.post') }}" method="POST" enctype="multipart/form-data" class="ms-auto me-auto mt-auto" style="width:400px">
    @csrf

    <div class="input-group">
        <input type="file" name="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"><Caption>Caption</label>
        <input class="form-control" id="exampleInputEmail1" name="caption" aria-describedby="emailHelp">
    </div>

    <button type="submit" class="btn btn-primary">Upload</button>
</form>

<div class="ms-auto me-auto mt-auto" style="width:400px">
    <h1>Recently Posted</h1>
    <ul>
        @foreach ($posts as $post)
            <ul>
                <h3>{{ $post->name }} posted Updated: {{ $post->updated_at->diffForHumans() }}</h3>
                <h1>{{ $post->caption }}</h1>
                @if ($post->content)
                    <h1>File name: {{ $post->content }}</h1>
                @endif
            </ul>

            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                    <form action="{{ route('like.post', ['post' => $post->id]) }}" method="POST">
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

@endsection
