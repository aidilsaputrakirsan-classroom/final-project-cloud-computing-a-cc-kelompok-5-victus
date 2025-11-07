@extends('layouts.admin.admin')

@section('title', $post->title)

@section('content')
  <div class="md:flex md:items-center md:justify-between mb-6">
    <h1 class="text-2xl font-semibold">View Post</h1>
    <div class="flex items-center gap-2">
      <a href="{{ route('posts.index') }}" class="btn btn-sm bg-primary text-white">Back</a>
      @auth
        @if(auth()->id() === $post->user_id)
          <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm bg-info text-white">Edit</a>
          <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline delete-form">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-sm bg-danger text-white btn-delete" data-name="{{ $post->title }}"
              data-type="post">Delete</button>
          </form>
        @endif
      @endauth
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h4 class="card-title">{{ $post->title }}</h4>
    </div>

    <div class="bg-white p-6 rounded">
      {{-- Alert placeholder for delete confirmation (inserted by shared JS) --}}
      <div id="delete-alert-placeholder"></div>

      <p class="text-muted">by {{ $post->user->name ?? 'N/A' }} — {{ $post->published_at?->format('Y-m-d') }}</p>

      @if($post->featured_image)
        <img src="{{ \Illuminate\Support\Facades\Storage::url($post->featured_image) }}" alt="" class="img-fluid mb-3">
      @endif

      <div class="prose max-w-none">{!! $post->content !!}</div>
    </div>
  </div>

@endsection

@push('scripts')
  <script src="{{ asset('assets/js/delete-confirm.js') }}"></script>
@endpush