@extends('layouts.admin.admin')

@section('title', $post->title)

@section('content')
  <article>
    <h1>{{ $post->title }}</h1>
    <p class="text-muted">by {{ $post->user->name ?? 'N/A' }} — {{ $post->published_at?->format('Y-m-d') }}</p>
    @if($post->featured_image)
      <img src="{{ \Illuminate\Support\Facades\Storage::url($post->featured_image) }}" alt="" class="img-fluid mb-3">
    @endif
    <div>{!! $post->content !!}</div>
    @auth
      @if(auth()->id() === $post->user_id)
        <div class="mt-3">
          <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-secondary">Edit</a>
          <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline-block"
            onsubmit="return confirm('Delete?');">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger">Delete</button>
          </form>
        </div>
      @endif
    @endauth
  </article>
@endsection