@extends('layouts.admin.admin')

@section('title', 'Comments Management')

@section('content')
  <div class="md:flex md:items-center md:justify-between mb-6">
    <h1 class="text-2xl font-semibold">Comments</h1>
  </div>

  <div class="card overflow-hidden">
    <div class="card-header">
      <h4 class="card-title">Posts with Comments</h4>
    </div>

    <div>
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
                    $url = route('admin.comments.index', $params);
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
                  <th class="px-6 py-3 text-start text-sm text-default-500">{!! ($buildSortLink)('title', 'Post') !!}</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">
                    {!! ($buildSortLink)('category', 'Category') !!}
                  </th>
                  <th class="px-6 py-3 text-center text-sm text-default-500">
                    {!! ($buildSortLink)('comments_count', 'Comments') !!}
                  </th>
                  <th class="px-6 py-3 text-end text-sm text-default-500">Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                @foreach($posts as $post)
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">{{ $post->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ \Illuminate\Support\Str::limit($post->title, 60) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                      @php $catName = optional($post->category)->name ?? 'Uncategorized'; @endphp
                      <span
                        class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-primary/25 text-sky-800">{{ $catName }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800 text-center">{{ $post->comments_count }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                      <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.comments.show', $post) }}" class="btn btn-sm bg-info text-white">Manage</a>
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