@csrf

<div class="grid lg:grid-cols-2 gap-6">
    <div>
        <label class="text-default-800 text-sm font-medium inline-block mb-2">Name</label>
        <input type="text" name="name" class="form-input" value="{{ old('name', $category->name ?? '') }}" required>
    </div>

    <div>
        <label class="text-default-800 text-sm font-medium inline-block mb-2">Slugs (optional)</label>
        <input type="text" name="slug" class="form-input" value="{{ old('slug', $category->slug ?? '') }}">
    </div>

    <div>
        <label class="text-default-800 text-sm font-medium inline-block mb-2">Parent</label>
        <select name="parent_id" class="form-select">
            <option value="">- None -</option>
            @foreach($parents as $p)
                <option value="{{ $p->id }}" {{ (old('parent_id', $category->parent_id ?? '') == $p->id) ? 'selected' : '' }}>
                    {{ $p->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="lg:col-span-2">
        <label class="text-default-800 text-sm font-medium inline-block mb-2">Description</label>
        <textarea name="description"
            class="form-input h-24">{{ old('description', $category->description ?? '') }}</textarea>
    </div>

    <div class="lg:col-span-2">
        <label class="inline-flex items-center">
            <input type="checkbox" name="is_active" value="1" class="form-checkbox" {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }}>
            <span class="ms-2 text-default-800">Active</span>
        </label>
    </div>

    <div class="lg:col-span-2">
        <button class="inline-block py-2 px-4 bg-primary text-white rounded">Save</button>
    </div>
</div>