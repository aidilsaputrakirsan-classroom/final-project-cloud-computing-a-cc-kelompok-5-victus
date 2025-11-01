@extends('layouts.app')

@php use Illuminate\Support\Str; @endphp

@section('title', 'Posts')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Image</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Author</th>
        <th>Published At</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
        <tr>
          <td>{{ $post->id }}</td>
          <td style="width:110px;">
            @if($post->featured_image)
              <img src="{{ \Illuminate\Support\Facades\Storage::url($post->featured_image) }}" alt="" style="max-height:60px; max-width:100px; object-fit:cover;" />
            @else
              <div style="width:100px;height:60px;background:#f5f5f5;display:flex;align-items:center;justify-content:center;color:#999;">No Image</div>
            @endif
          </td>
          <td><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></td>
          <td>{{ $post->category->name ?? 'Uncategorized' }}</td>
          <td>{{ ucfirst($post->status) }}</td>
          <td>{{ $post->user->name ?? 'N/A' }}</td>
          <td>{{ $post->published_at?->format('Y-m-d') }}</td>
          <td>
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-secondary">Edit</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete post?');">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{ $posts->links() }}

@endsection
