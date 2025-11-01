@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
  <h1>Create Category</h1>

  <form action="{{ route('categories.store') }}" method="POST">
    @include('categories._form')
  </form>

@endsection
