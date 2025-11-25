@extends('layouts.admin.admin')

@section('title', 'Edit Tag')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-semibold">Edit Tag</h1>
</div>

<div class="card p-6">
    <form method="POST" action="{{ route('admin.tags.update', $tag->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Tag Name</label>
            <input type="text" name="name" value="{{ old('name', $tag->name) }}"
                   class="form-input w-full" required>
            @error('name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="btn bg-primary text-white">
                Update Tag
            </button>

            <a href="{{ route('admin.tags.index') }}" class="btn bg-gray-300">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
