@extends('layout')
@section('title', 'Content')

@section('content')

<h3>{{ $post->name }} posted Updated:{{ $post->updated_at->diffForHumans() }}</h3>
<h1>{{ $post->caption }}</h1>
<h1>{{ $post->content }}</h1>
<h1>{{ $post->bmc1 }}</h1>
<h1>{{ $post->bmc2 }}</h1>
<h1>{{ $post->bmc3 }}</h1>
<h1>{{ $post->bmc4 }}</h1>
<h1>{{ $post->bmc5 }}</h1>
<h1>{{ $post->bmc6 }}</h1>
<h1>{{ $post->bmc7 }}</h1>
<h1>{{ $post->bmc8 }}</h1>
<h1>{{ $post->bmc9 }}</h1>

<!-- Display comments -->
<form action="{{ route('review.post', $post->id) }}" method="POST" enctype="multipart/form-data" class="ms-auto me-auto mt-auto" style="width:400px">
    @csrf

    @if($comments->isNotEmpty())
        <h2>Comments</h2>
        <ul>
            @foreach($comments as $comment)
                @if($comment->post == $post->id)
                    <ul>{{ $comment->name }} reviewed: <b>{{ $comment->content }}</b> file: {{ $comment->filename }}
                        {{ $comment->updated_at->diffForHumans() }}.</ul>
                @endif
            @endforeach
        </ul>
    @else
        <p>No comments yet.</p>
    @endif

    @if(auth()->user()->profile && auth()->user()->profile->role == 'teacher')
        <div class="input-group">
            <input type="file" name="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Review</label>
            <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="review">
        </div>

        <button type="submit" class="btn btn-primary">Review</button>
    @endif

</form>

@endsection
