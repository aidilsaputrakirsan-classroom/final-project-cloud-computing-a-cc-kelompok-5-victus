@extends('layouts.admin.admin')

@section('title', 'Categories')

@section('content')
  <div class="md:flex md:items-center md:justify-between mb-6">
    <h1 class="text-2xl font-semibold">Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-sm bg-primary text-white">New Category</a>
  </div>

  <div class="card overflow-hidden">
    <div class="card-header">
      <h4 class="card-title">Categories</h4>
    </div>

    <div>
      {{-- Alert placeholder for delete confirmation (inserts template-styled alert) --}}
      <div id="delete-alert-placeholder"></div>
      <div class="overflow-x-auto">
        <div class="min-w-full inline-block align-middle">
          <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                @php
                  $currentSort = request()->get('sort', 'id');
                  $currentDir = strtolower(request()->get('direction', 'asc')) === 'desc' ? 'desc' : 'asc';
                  $buildSortLink = function ($column, $label) use ($currentSort, $currentDir) {
                      $newDir = ($currentSort === $column && $currentDir === 'asc') ? 'desc' : 'asc';
                      $params = array_merge(request()->except('page'), ['sort' => $column, 'direction' => $newDir]);
                      $url = route('categories.index', $params);
                      $indicator = '';
                      if ($currentSort === $column) {
                          $indicator = $currentDir === 'asc' ? '▲' : '▼';
                      }
                      $inner = '<span style="display:inline-flex;align-items:center;gap:6px;white-space:nowrap;">' . htmlentities($label) . ($indicator ? '<span class="sort-indicator" style="font-size:12px;line-height:1;">' . $indicator . '</span>' : '') . '</span>';
                      return '<a href="' . $url . '" class="hover:underline">' . $inner . '</a>';
                  };
                @endphp
                <tr>
                  <th class="px-6 py-3 text-start text-sm text-default-500">{!! ($buildSortLink)('id', '#') !!}</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">{!! ($buildSortLink)('name', 'Name') !!}</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">{!! ($buildSortLink)('slug', 'Slug') !!}</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">{!! ($buildSortLink)('parent', 'Parent') !!}</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">{!! ($buildSortLink)('active', 'Active') !!}</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">{!! ($buildSortLink)('posts', 'Posts') !!}</th>
                  <th class="px-6 py-3 text-end text-sm text-default-500">Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                @foreach($categories as $cat)
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">{{ $cat->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $cat->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $cat->slug }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ optional($cat->parent)->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                      @if($cat->is_active)
                        <span
                          class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-success/25 text-success text-sm font-medium">Yes</span>
                      @else
                        <span
                          class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary/25 text-secondary text-sm font-medium">No</span>
                      @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $cat->posts_count }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                      <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('categories.edit', $cat) }}" class="btn btn-sm bg-info text-white">Edit</a>
                        <form action="{{ route('categories.destroy', $cat) }}" method="POST" class="inline delete-form">
                          @csrf
                          @method('DELETE')
                          <button type="button" class="btn btn-sm bg-danger text-white btn-delete"
                            data-name="{{ $cat->name }}" data-type="category">Delete</button>
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

  <div class="mt-4">{{ $categories->links() }}</div>

@endsection

@push('scripts')
  <script src="{{ asset('assets/js/delete-confirm.js') }}"></script>
@endpush