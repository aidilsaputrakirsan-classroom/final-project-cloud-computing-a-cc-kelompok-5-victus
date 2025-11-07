@extends('layouts.admin.admin')

@section('title', 'Posts')

@section('content')
  @php
    $pageTitle = 'Posts';
    $pageSubtitle = 'Manage Posts';
  @endphp

  <div class="md:flex md:items-center md:justify-between mb-6">
    <h1 class="text-2xl font-semibold">Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-sm bg-primary text-white">New Post</a>
  </div>

  <div class="card overflow-hidden">
    <div class="card-header">
      <h4 class="card-title">Posts</h4>
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
                  // default to id asc for initial view so UI indicates the base ordering
                  $currentSort = request()->get('sort', 'id');
                  $currentDir = strtolower(request()->get('direction', 'asc')) === 'desc' ? 'desc' : 'asc';
                  $buildSortLink = function ($column, $label) use ($currentSort, $currentDir) {
                    $newDir = ($currentSort === $column && $currentDir === 'asc') ? 'desc' : 'asc';
                    $params = array_merge(request()->except('page'), ['sort' => $column, 'direction' => $newDir]);
                    $url = route('posts.index', $params);
                    $indicator = '';
                    if ($currentSort === $column) {
                      $indicator = $currentDir === 'asc' ? '▲' : '▼';
                    }
                    // Render label + indicator inline and prevent wrapping so indicator stays beside the title
                    $inner = '<span style="display:inline-flex;align-items:center;gap:6px;white-space:nowrap;">' . htmlentities($label) . ($indicator ? '<span class="sort-indicator" style="font-size:12px;line-height:1;">' . $indicator . '</span>' : '') . '</span>';
                    return '<a href="' . $url . '" class="hover:underline">' . $inner . '</a>';
                  };
                @endphp
                <tr>
                  <th class="px-6 py-3 text-start text-sm text-default-500">{!! ($buildSortLink)('id', '#') !!}</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">Image</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">{!! ($buildSortLink)('title', 'Title') !!}
                  </th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">
                    {!! ($buildSortLink)('category', 'Category') !!}</th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">{!! ($buildSortLink)('status', 'Status') !!}
                  </th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">{!! ($buildSortLink)('author', 'Author') !!}
                  </th>
                  <th class="px-6 py-3 text-start text-sm text-default-500">
                    {!! ($buildSortLink)('published', 'Published') !!}</th>
                  <th class="px-6 py-3 text-end text-sm text-default-500">Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                @foreach($posts as $post)
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">{{ $post->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap" style="width:120px;">
                      @if($post->featured_image)
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($post->featured_image) }}" alt=""
                          class="h-16 w-28 object-cover rounded">
                      @else
                        <div class="h-16 w-28 bg-gray-100 flex items-center justify-center text-sm text-default-500 rounded">
                          No Image</div>
                      @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800"><a
                        href="{{ route('posts.show', $post) }}"
                        class="text-default-800 hover:underline">{{ $post->title }}</a></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                      @if($post->category)
                        <span
                          class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-primary/25 text-sky-800">{{ $post->category->name }}</span>
                      @else
                        <span
                          class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-100 text-default-800">Uncategorized</span>
                      @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                      @if($post->status === 'published')
                        <span
                          class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-green-100 text-green-800">Published</span>
                      @elseif($post->status === 'draft')
                        <span
                          class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Draft</span>
                      @elseif($post->status === 'archived')
                        <span
                          class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-white/10 text-default-600">Archived</span>
                      @else
                        <span
                          class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-100 text-default-800">{{ ucfirst($post->status) }}</span>
                      @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $post->user->name ?? 'N/A' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                      {{ $post->published_at?->format('Y-m-d') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                      <div class="flex flex-col items-end gap-2">
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm bg-info text-white w-fit">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline delete-form">
                          @csrf
                          @method('DELETE')
                          <button type="button" class="btn btn-sm bg-danger text-white btn-delete w-fit"
                            data-name="{{ $post->title }}" data-type="post">Delete</button>
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

  <div class="mt-4">{{ $posts->links() }}</div>

@endsection

@push('scripts')
  <script src="{{ asset('assets/js/delete-confirm.js') }}"></script>
@endpush