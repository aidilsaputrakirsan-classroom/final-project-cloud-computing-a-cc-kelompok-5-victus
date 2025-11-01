@php use Illuminate\Support\Str; @endphp

@csrf

<div class="grid lg:grid-cols-2 gap-6">
    <div>
        <label class="text-default-800 text-sm font-medium inline-block mb-2">Title</label>
        <input type="text" name="title" class="form-input" value="{{ old('title', $post->title ?? '') }}" required>
    </div>

    <div>
        <label class="text-default-800 text-sm font-medium inline-block mb-2">Slug (optional)</label>
        <input type="text" name="slug" class="form-input" value="{{ old('slug', $post->slug ?? '') }}">
    </div>

    <div>
        <label class="text-default-800 text-sm font-medium inline-block mb-2">Category</label>
        <select name="category_id" class="form-select">
            <option value="">- None -</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ (old('category_id', $post->category_id ?? '') == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="lg:col-span-2">
        <label class="text-default-800 text-sm font-medium inline-block mb-2">Content</label>
        <textarea name="content" class="form-input h-28">{{ old('content', $post->content ?? '') }}</textarea>
    </div>

    <div>
        <label class="text-default-800 text-sm font-medium inline-block mb-2">Featured image (optional)</label>
        <input type="file" name="featured_image" class="form-input">
        @if(!empty($post->featured_image))
            <div class="mt-2">
                <img src="{{ \Illuminate\Support\Facades\Storage::url($post->featured_image) }}" alt="" class="h-28 object-cover">
            </div>
        @endif
    </div>

    <div>
        <label class="text-default-800 text-sm font-medium inline-block mb-2">Status</label>
        @php $st = old('status', $post->status ?? 'draft'); @endphp
        <select name="status" class="form-select">
            <option value="draft" {{ $st === 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="published" {{ $st === 'published' ? 'selected' : '' }}>Published</option>
            <option value="archived" {{ $st === 'archived' ? 'selected' : '' }}>Archived</option>
        </select>
    </div>

    <div class="lg:col-span-2">
        <button class="inline-block py-2 px-4 bg-primary text-white rounded">Save</button>
    </div>
</div>
