@extends('layouts.admin.admin')

@section('title', 'Post Tags')

@section('content')
    <div class="md:flex md:items-center md:justify-between mb-6">
        <h1 class="text-2xl font-semibold">Post Tags</h1>
        <a href="{{ route('admin.tags.create') }}" class="btn btn-sm bg-primary text-white">New Tag</a>
    </div>

    <div class="card overflow-hidden">
        <div class="card-header">
            <h4 class="card-title">Tags List</h4>
        </div>

        <div>
            {{-- Alert placeholder for delete confirmation --}}
            <div id="delete-alert-placeholder"></div>

            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                @php
                                    $currentSort = request()->get('sort', 'id');
                                    $currentDir =
                                        strtolower(request()->get('direction', 'asc')) === 'desc' ? 'desc' : 'asc';
                                    $buildSortLink = function ($column, $label) use ($currentSort, $currentDir) {
                                        $newDir = $currentSort === $column && $currentDir === 'asc' ? 'desc' : 'asc';
                                        $params = array_merge(request()->except('page'), [
                                            'sort' => $column,
                                            'direction' => $newDir,
                                        ]);
                                        $url = route('admin.tags.index', $params);
                                        $indicator = '';
                                        if ($currentSort === $column) {
                                            $indicator = $currentDir === 'asc' ? '▲' : '▼';
                                        }
                                        $inner =
                                            '<span style="display:inline-flex;align-items:center;gap:6px;white-space:nowrap;">' .
                                            htmlentities($label) .
                                            ($indicator
                                                ? '<span class="sort-indicator" style="font-size:12px;line-height:1;">' .
                                                    $indicator .
                                                    '</span>'
                                                : '') .
                                            '</span>';
                                        return '<a href="' . $url . '" class="hover:underline">' . $inner . '</a>';
                                    };
                                @endphp
                                <tr>
                                    <th class="px-6 py-3 text-start text-sm text-default-500">{!! $buildSortLink('id', '#') !!}</th>
                                    <th class="px-6 py-3 text-start text-sm text-default-500">{!! $buildSortLink('name', 'Name') !!}</th>
                                    <th class="px-6 py-3 text-start text-sm text-default-500">{!! $buildSortLink('slug', 'Slug') !!}</th>
                                    <th class="px-6 py-3 text-start text-sm text-default-500">Posts Count</th>
                                    <th class="px-6 py-3 text-end text-sm text-default-500">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($tags as $tag)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                            {{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $tag->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $tag->slug }}
                                        </td>
                                        {{-- Menghitung jumlah post yang memiliki tag ini --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                                            {{ $tag->posts_count ?? $tag->posts->count() }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <div class="flex items-center justify-end gap-2">
                                                <a href="{{ route('admin.tags.edit', $tag->id) }}"
                                                    class="btn btn-sm bg-info text-white">Edit</a>

                                                <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST"
                                                    class="inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="btn btn-sm bg-danger text-white btn-delete"
                                                        data-name="{{ $tag->name }}" data-type="tag">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-sm text-default-800">No tags
                                            found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        @if ($tags instanceof \Illuminate\Pagination\LengthAwarePaginator)
            {{ $tags->links() }}
        @endif
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/delete-confirm.js') }}"></script>
@endpush
