@extends('layouts.admin')

@section('title', 'Edit Post')

@section('content')
  <div class="md:flex md:items-center md:justify-between mb-6">
    <h1 class="text-2xl font-semibold">Edit Post.</h1>
  </div>

  <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded">
    @method('PUT')
    @include('posts._form')
  </form>

@endsection
