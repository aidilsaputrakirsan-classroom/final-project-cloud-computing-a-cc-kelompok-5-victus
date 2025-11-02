@extends('layouts.admin.admin')

@php use Illuminate\Support\Str; @endphp

@section('title', 'Posts')

@section('content')
  @php
    $pageTitle = 'Posts';
    $pageSubtitle = 'Manage Posts';
  @endphp

  <div class="md:flex md:items-center md:justify-between mb-6">
    <h1 class="text-2xl font-semibold">Posts</h1>
    <a href="{{ route('posts.create') }}" class="inline-block py-2 px-4 bg-primary text-white rounded">New Post</a>
  </div>

  <div class="card overflow-hidden">
    <div class="card-header">
      <h4 class="card-title">Posts</h4>
    </div>

    <div>
      <div class="overflow-x-auto">
        <div class="min-w-full inline-block align-middle">
          <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
              <thead>
                <tr>
                  <th class="px-6 py-3 text-start text-sm text-default-500">#</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">Image</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">Title</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">Category</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">Status</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">Author</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">Published</th>
                  <th class="px-6 py-3 text-end text-sm text-default-500">Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                @foreach($posts as $post)
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">{{ $post->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap" style="width:120px;">
                      @if($post->featured_image)
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($post->featured_image) }}" alt=""
                          class="h-16 w-28 object-cover rounded">
                      @else
                        <div class="h-16 w-28 bg-gray-100 flex items-center justify-center text-sm text-default-500 rounded">
                          No Image</div>
                      @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800"><a
                        href="{{ route('posts.show', $post) }}"
                        class="text-default-800 hover:underline">{{ $post->title }}</a></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                      {{ $post->category->name ?? 'Uncategorized' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ ucfirst($post->status) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $post->user->name ?? 'N/A' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                      {{ $post->published_at?->format('Y-m-d') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                      <a href="{{ route('posts.edit', $post) }}" class="text-primary hover:text-sky-700 mr-3">Edit</a>
                      <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline"
                        onsubmit="return confirm('Delete post?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:text-red-900">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-4">{{ $posts->links() }}</div>

@endsection