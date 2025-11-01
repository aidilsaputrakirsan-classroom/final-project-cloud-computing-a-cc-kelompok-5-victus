@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')
  <div class="md:flex md:items-center md:justify-between mb-6">
    <h1 class="text-2xl font-semibold">Create Category</h1>
  </div>

  <div class="card">
    <div class="card-header">
      <h4 class="card-title">New Category</h4>
    </div>
    <div class="p-6">
      <form action="{{ route('categories.store') }}" method="POST">
        @include('categories._form')
      </form>
    </div>
  </div>

@endsection
