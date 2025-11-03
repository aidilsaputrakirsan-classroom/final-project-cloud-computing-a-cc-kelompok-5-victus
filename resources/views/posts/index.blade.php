@extends('layouts.admin.admin')

@section('title', 'Posts')

@section('content')
  <div class="md:flex md:items-center md:justify-between mb-6">
    <h1 class="text-2xl font-semibold">Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-sm bg-primary text-white">New Post</a>
  </div>

  {{-- Filter --}}
  <form method="GET" action="{{ route('posts.index') }}" class="mb-4 flex flex-wrap gap-3 items-end">
    <div>
      <label class="block text-sm font-medium text-gray-700">Category</label>
      <select name="category_id" class="form-select rounded-md border-gray-300">
        <option value="">All</option>
        @foreach($categories as $cat)
          <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
            {{ $cat->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700">Status</label>
      <select name="status" class="form-select rounded-md border-gray-300">
        <option value="">All</option>
        <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
      </select>
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700">Author</label>
      <select name="author_id" class="form-select rounded-md border-gray-300">
        <option value="">All</option>
        @foreach($authors as $user)
          <option value="{{ $user->id }}" {{ request('author_id') == $user->id ? 'selected' : '' }}>
            {{ $user->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div>
      <button type="submit" class="btn bg-primary text-white">Filter</button>
      <a href="{{ route('posts.index') }}" class="btn bg-gray-200">Reset</a>
    </div>
  </form>

  {{-- Table --}}
  <div class="card overflow-hidden">
    <div class="card-header">
      <h4 class="card-title">Posts</h4>
    </div>

    <div>
      <div id="delete-alert-placeholder"></div>
      <div class="overflow-x-auto">
        <div class="min-w-full inline-block align-middle">
          <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
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
                @forelse($posts as $post)
                  <tr>
                    <td class="px-6 py-4">{{ $post->id }}</td>
                    <td class="px-6 py-4">
                      @if($post->featured_image)
                        <img src="{{ Storage::url($post->featured_image) }}" class="h-16 w-28 object-cover rounded">
                      @else
                        <div class="h-16 w-28 bg-gray-100 flex items-center justify-center text-sm text-default-500 rounded">No Image</div>
                      @endif
                    </td>
                    <td class="px-6 py-4">{{ $post->title }}</td>
                    <td class="px-6 py-4">{{ $post->category->name ?? 'Uncategorized' }}</td>
                    <td class="px-6 py-4">{{ ucfirst($post->status) }}</td>
                    <td class="px-6 py-4">{{ $post->user->name ?? 'N/A' }}</td>
                    <td class="px-6 py-4">{{ $post->published_at?->format('Y-m-d') }}</td>
                    <td class="px-6 py-4 text-end">
                      <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm bg-info text-white w-fit">Edit</a>
                      <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm bg-danger text-white btn-delete w-fit" data-name="{{ $post->title }}" data-type="post">Delete</button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="8" class="text-center py-4 text-gray-500">No posts found.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-4">{{ $posts->links() }}</div>
@endsection

@push('scripts')
  <script src="{{ asset('assets/js/delete-confirm.js') }}"></script>
@endpush
