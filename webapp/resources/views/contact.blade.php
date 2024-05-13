@extends('layout')
@section('title', 'Contact')

@section('content')




<!-- Display comments -->
<form action="{{ route('contact.post') }}" method="POST" class="ms-auto me-auto mt-auto" style="width:400px">
    @csrf

    <h2>Contact Us</h2>

    <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">First Name</label>
            <input  class="form-control" id="exampleInputEmail1" name="firstname">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Last Name</label>
            <input  class="form-control" id="exampleInputEmail1" name="lastsname">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email"  class="form-control" id="exampleInputEmail1" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">How Can We Help</label>
            <input  class="form-control" id="exampleInputEmail1" name="help">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

</form>



@endsection