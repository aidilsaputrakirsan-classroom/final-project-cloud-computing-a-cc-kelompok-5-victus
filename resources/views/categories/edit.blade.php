@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
  <h1>Edit Category</h1>

  <form action="{{ route('categories.update', $category) }}" method="POST">
    @method('PUT')
    @include('categories._form')
  </form>

@endsection
