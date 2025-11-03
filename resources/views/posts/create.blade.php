@extends('layouts.admin.admin')

@section('title', 'Create Post')

@section('content')
  <div class="md:flex md:items-center md:justify-between mb-6">
    <h1 class="text-2xl font-semibold">Create Post</h1>
  </div>

  <div class="card">
    <div class="card-header">
      <h4 class="card-title">New Post</h4>
    </div>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded">
      @include('posts._form')
    </form>
  </div>

@endsection