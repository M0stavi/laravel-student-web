@extends('layout')
@section('title', 'Post')

@section('content')


<h3>{{ $post->name }} posted Updated:{{ $post->updated_at->diffForHumans()}}</h3>
<h1>{{ $post->caption }}</h1>
<h1>{{ $post->content }}</h1>

<!-- Display comments -->
<form action="{{ route('comment.post', $post->id) }}" method="POST" class="ms-auto me-auto mt-auto" style="width:400px">
    @csrf

@if($comments->isNotEmpty())
    <h2>Comments</h2>
    <ul>
        @foreach($comments as $comment)
            @if( $comment->post == $post->id)
                <ul>{{ $comment->name }} commented: <b> {{ $comment->content }} </b> 
                    {{ $comment->updated_at->diffForHumans()}}.</ul>
             @endif
        @endforeach
    </ul>
@else
    <p>No comments yet.</p>
@endif

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Comment</label>
            <input  class="form-control" id="exampleInputEmail1" name="comment" aria-describedby="emailHelp">
        </div>


        <button type="submit"  class="btn btn-primary">Comment</button>

</form>



@endsection