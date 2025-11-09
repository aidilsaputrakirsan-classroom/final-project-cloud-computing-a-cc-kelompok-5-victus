@extends('layouts.admin.admin')

@section('title', 'Edit Comment')

@section('content')

  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Edit Comment</h4>
    </div>
    <div class="p-6">
      <form action="{{ route('admin.comments.update', $comment) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label class="block mb-1">Content</label>
          <textarea name="content" class="form-control w-full" rows="5"
            required>{{ old('content', $comment->content) }}</textarea>

          @error('content')<div class="text-red-600">{{ $message }}</div>@enderror
        </div>
        <div>
          <button class="btn btn-sm bg-primary text-white" type="submit">Save</button>
          <a href="{{ route('admin.comments.show', $comment->post_id) }}" class="btn btn-sm bg-info text-white">Cancel</a>
        </div>
      </form>
    </div>
  </div>

@endsection