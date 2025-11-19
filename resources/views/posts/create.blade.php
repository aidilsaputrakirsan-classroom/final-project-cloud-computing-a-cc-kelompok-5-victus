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

    <div class="mb-3">
        <label class="form-label">Tags</label>
        <div class="d-flex flex-wrap gap-2 border p-2 rounded">
            @foreach ($tags as $tag)
                <div class="form-check me-3">
                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}"
                        id="tag-{{ $tag->id }}">
                    <label class="form-check-label" for="tag-{{ $tag->id }}">
                        {{ $tag->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>

@endsection
