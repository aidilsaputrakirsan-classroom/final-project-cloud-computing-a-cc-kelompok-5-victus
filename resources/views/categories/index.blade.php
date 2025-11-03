@extends('layouts.admin.admin')

@section('title', 'Categories')

@section('content')
  <div class="md:flex md:items-center md:justify-between mb-6">
    <h1 class="text-2xl font-semibold">Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-sm bg-primary text-white">New Category</a>
  </div>

  {{-- Filter --}}
  <form method="GET" action="{{ route('categories.index') }}" class="mb-4 flex flex-wrap gap-3 items-end">
    <div>
      <label class="block text-sm font-medium text-gray-700">Active</label>
      <select name="is_active" class="form-select rounded-md border-gray-300">
        <option value="">All</option>
        <option value="1" {{ request('is_active') === '1' ? 'selected' : '' }}>Active</option>
        <option value="0" {{ request('is_active') === '0' ? 'selected' : '' }}>Inactive</option>
      </select>
    </div>
    <div>
      <button type="submit" class="btn bg-primary text-white">Filter</button>
      <a href="{{ route('categories.index') }}" class="btn bg-gray-200">Reset</a>
    </div>
  </form>

  <div class="card overflow-hidden">
    <div class="card-header">
      <h4 class="card-title">Categories</h4>
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
                  <th class="px-6 py-3 text-start text-sm text-default-500">Name</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">Slug</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">Parent</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">Active</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">Posts</th>
                  <th class="px-6 py-3 text-end text-sm text-default-500">Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                @forelse($categories as $cat)
                  <tr>
                    <td class="px-6 py-4">{{ $cat->id }}</td>
                    <td class="px-6 py-4">{{ $cat->name }}</td>
                    <td class="px-6 py-4">{{ $cat->slug }}</td>
                    <td class="px-6 py-4">{{ optional($cat->parent)->name }}</td>
                    <td class="px-6 py-4">
                      @if($cat->is_active)
                        <span
                          class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-success/25 text-success text-sm font-medium">Yes</span>
                      @else
                        <span
                          class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary/25 text-secondary text-sm font-medium">No</span>
                      @endif
                    </td>
                    <td class="px-6 py-4">{{ $cat->posts_count }}</td>
                    <td class="px-6 py-4 text-end">
                      <a href="{{ route('categories.edit', $cat) }}" class="btn btn-sm bg-info text-white">Edit</a>
                      <form action="{{ route('categories.destroy', $cat) }}" method="POST" class="inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm bg-danger text-white btn-delete w-fit"
                          data-name="{{ $cat->name }}" data-type="category">Delete</button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" class="text-center py-4 text-gray-500">No categories found.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-4">{{ $categories->links() }}</div>
@endsection

@push('scripts')
  <script src="{{ asset('assets/js/delete-confirm.js') }}"></script>
@endpush