@extends('layouts.admin.admin')

@section('title', 'Create Tag')

@section('content')
    <div class="md:flex md:items-center md:justify-between mb-6">
        <h1 class="text-2xl font-semibold">Create New Tag</h1>
        <a href="{{ route('admin.tags.index') }}" class="btn btn-sm bg-secondary text-white">Back to List</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Tag</h4>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.tags.store') }}" method="POST">
                @csrf

                {{-- Input Name --}}
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-default-700 mb-2">Tag Name</label>
                    <input type="text" name="name" id="name"
                        class="form-input block w-full rounded-lg border-default-200 focus:ring-primary focus:border-primary"
                        value="{{ old('name') }}" placeholder="Enter tag name (e.g. Travel)" required autofocus>
                    @error('name')
                        <span class="text-danger text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Tombol Save --}}
                <div class="flex justify-end mt-6">
                    <button type="submit" class="btn bg-primary text-white">
                        Save Tag
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
