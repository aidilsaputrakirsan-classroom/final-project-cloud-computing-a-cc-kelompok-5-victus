@extends('layouts.app')

@section('title', 'Categories')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">New Category</a>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Parent</th>
        <th>Active</th>
        <th>Posts</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $cat)
        <tr>
          <td>{{ $cat->id }}</td>
          <td>{{ $cat->name }}</td>
          <td>{{ $cat->slug }}</td>
          <td>{{ optional($cat->parent)->name }}</td>
          <td>{{ $cat->is_active ? 'Yes' : 'No' }}</td>
          <td>{{ $cat->posts_count }}</td>
          <td>
            <a href="{{ route('categories.edit', $cat) }}" class="btn btn-sm btn-secondary">Edit</a>
            <form action="{{ route('categories.destroy', $cat) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete category?');">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{ $categories->links() }}

@endsection
