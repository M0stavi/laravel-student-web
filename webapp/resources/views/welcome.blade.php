@extends('layout')
@section('title', 'Home')

@section('content')

@auth
hello {{auth()->user()->name}}
@endauth
@endsection