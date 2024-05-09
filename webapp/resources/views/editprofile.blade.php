@extends('layout')
@section('title', 'Login')

@section('content')
<!-- {{auth()->user()->email}} -->
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
    <form action="{{route('completeprofile.post')}}" method="POST" class="ms-auto me-auto mt-auto" style="width:400px">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Role</label>
            <input  class="form-control" id="exampleInputEmail1" name="role" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Gender</label>
            <input  class="form-control" id="exampleInputEmail1" name="gender" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Contact</label>
            <input  class="form-control" id="exampleInputEmail1" name="contact" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Address</label>
            <input  class="form-control" id="exampleInputEmail1" name="address" aria-describedby="emailHelp">
        </div>
        
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<!-- </div> -->
@endsection()