@php use Illuminate\Support\Str; @endphp

@csrf

<div class="mb-3">
  <label class="form-label">Title</label>
  <input type="text" name="title" class="form-control" value="{{ old('title', $post->title ?? '') }}" required>
</div>

<div class="mb-3">
  <label class="form-label">Slug (optional)</label>
  <input type="text" name="slug" class="form-control" value="{{ old('slug', $post->slug ?? '') }}">
</div>

<div class="mb-3">
  <label class="form-label">Category</label>
  <select name="category_id" class="form-select">
    <option value="">- None -</option>
    @foreach($categories as $cat)
      <option value="{{ $cat->id }}" {{ (old('category_id', $post->category_id ?? '') == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
    @endforeach
  </select>
</div>

<div class="mb-3">
  <label class="form-label">Content</label>
  <textarea name="content" class="form-control" rows="8">{{ old('content', $post->content ?? '') }}</textarea>
</div>

<div class="mb-3">
  <label class="form-label">Featured image URL (optional)</label>
  <input type="file" name="featured_image" class="form-control">
  @if(!empty($post->featured_image))
    <div class="mt-2">
      <img src="{{ \Illuminate\Support\Facades\Storage::url($post->featured_image) }}" alt="" style="max-height:120px">
    </div>
  @endif
</div>

<div class="mb-3">
  <label class="form-label">Status</label>
  <select name="status" class="form-select">
    @php $st = old('status', $post->status ?? 'draft'); @endphp
    <option value="draft" {{ $st === 'draft' ? 'selected' : '' }}>Draft</option>
    <option value="published" {{ $st === 'published' ? 'selected' : '' }}>Published</option>
    <option value="archived" {{ $st === 'archived' ? 'selected' : '' }}>Archived</option>
  </select>
</div>

<button class="btn btn-primary">Save</button>
