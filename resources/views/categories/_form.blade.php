@csrf

<div class="mb-3">
  <label class="form-label">Name</label>
  <input type="text" name="name" class="form-control" value="{{ old('name', $category->name ?? '') }}" required>
</div>

<div class="mb-3">
  <label class="form-label">Slug (optional)</label>
  <input type="text" name="slug" class="form-control" value="{{ old('slug', $category->slug ?? '') }}">
</div>

<div class="mb-3">
  <label class="form-label">Parent</label>
  <select name="parent_id" class="form-select">
    <option value="">- None -</option>
    @foreach($parents as $p)
      <option value="{{ $p->id }}" {{ (old('parent_id', $category->parent_id ?? '') == $p->id) ? 'selected' : '' }}>{{ $p->name }}</option>
    @endforeach
  </select>
</div>

<div class="mb-3">
  <label class="form-label">Description</label>
  <textarea name="description" class="form-control" rows="4">{{ old('description', $category->description ?? '') }}</textarea>
</div>

<div class="form-check mb-3">
  <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }}>
  <label class="form-check-label" for="is_active">Active</label>
</div>

<button class="btn btn-primary">Save</button>
