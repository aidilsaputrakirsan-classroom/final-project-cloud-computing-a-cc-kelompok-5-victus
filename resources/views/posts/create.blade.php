@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
  <h1>Create Post</h1>

  <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @include('posts._form')
  </form>

@endsection
