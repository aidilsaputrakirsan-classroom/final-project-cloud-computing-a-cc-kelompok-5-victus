@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')
  <div class="md:flex md:items-center md:justify-between mb-6">
    <h1 class="text-2xl font-semibold">Create Category</h1>
  </div>

  <form action="{{ route('categories.store') }}" method="POST" class="bg-white p-6 rounded">
    @include('categories._form')
  </form>

@endsection
