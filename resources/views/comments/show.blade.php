@extends('layouts.admin.admin')

@section('title', 'Comments for: ' . $post->title)

@section('content')
  <div class="md:flex md:items-center md:justify-between mb-6">
    <h1 class="text-2xl font-semibold">Comments for: {{ $post->title }}</h1>
    <div class="mt-4 md:mt-0">
      <a href="{{ route('admin.comments.index') }}" class="btn btn-sm bg-primary text-white">Back</a>
      <a href="{{ route('admin.comments.create', $post) }}" class="btn btn-sm bg-info text-white w-fit">Add Admin
        Comment</a>
    </div>
  </div>

  <div class="card overflow-hidden">
    <div class="card-header">
      <h4 class="card-title">Comments</h4>
    </div>

    <div>
      <div id="delete-alert-placeholder"></div>
      <div class="overflow-x-auto">
        <div class="min-w-full inline-block align-middle">
          <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-start text-sm text-default-500">Author</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">Content</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">Date</th>
                  <th class="px-6 py-3 text-end text-sm text-default-500">Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                @foreach($comments as $comment)
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                      {{ $comment->name }}
                      @if($comment->is_admin || strtolower($comment->name) === 'admin')
                        <span
                          class="inline-flex items-center ml-2 px-2 py-0.5 rounded-full bg-primary/25 text-primary text-xs font-medium">Admin</span>
                      @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $comment->content }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                      {{ $comment->created_at->format('Y-m-d H:i') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                      <div class="flex items-center justify-end gap-2">
                        @if(strtolower($comment->name) === 'admin' || $comment->name === auth()->user()->name)
                          <a href="{{ route('admin.comments.edit', $comment) }}"
                            class="btn btn-sm bg-info text-white">Edit</a>
                        @endif
                        <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST"
                          class="inline delete-form">
                          @csrf
                          @method('DELETE')
                          <button type="button" class="btn btn-sm bg-danger text-white btn-delete"
                            data-name="{{ $comment->name }}" data-type="comment">Delete</button>
                        </form>
                      </div>
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

@endsection

@push('scripts')
  <script src="{{ asset('assets/js/delete-confirm.js') }}"></script>
@endpush