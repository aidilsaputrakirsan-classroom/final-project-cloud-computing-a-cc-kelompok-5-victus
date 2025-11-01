@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
  <h1>Edit Post</h1>

  <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @include('posts._form')
  </form>

@endsection
