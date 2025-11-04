@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
  <div class="md:flex md:items-center md:justify-between mb-6">
    <h1 class="text-2xl font-semibold">Edit Category</h1>
  </div>

  <form action="{{ route('categories.update', $category) }}" method="POST" class="bg-white p-6 rounded">
    @method('PUT')
    @include('categories._form')
  </form>

@endsection