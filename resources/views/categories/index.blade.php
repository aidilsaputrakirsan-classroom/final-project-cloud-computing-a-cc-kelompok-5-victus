@extends('layouts.admin')

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
                @foreach($categories as $cat)
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">{{ $cat->id }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $cat->name }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $cat->slug }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ optional($cat->parent)->name }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm">
                    @if($cat->is_active)
                      <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-success/25 text-success text-sm font-medium">Yes</span>
                    @else
                      <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary/25 text-secondary text-sm font-medium">No</span>
                    @endif
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $cat->posts_count }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                    <div class="flex items-center justify-end gap-2">
                      <a href="{{ route('categories.edit', $cat) }}" class="btn btn-sm bg-info text-white">Edit</a>
                      <form action="{{ route('categories.destroy', $cat) }}" method="POST" class="inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm bg-danger text-white btn-delete" data-name="{{ $cat->name }}">Deletes</button>
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
<script>
  (function () {
    const placeholder = document.getElementById('delete-alert-placeholder');

    function showDeleteConfirm(form, name) {
      // clear existing
      placeholder.innerHTML = '';

      const id = 'delete-alert';
      const html = `
        <div id="${id}" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-danger/25 border border-danger rounded-md p-4 mb-4" role="alert">
          <div class="flex items-center gap-3">
            <div class="flex-grow">
              <div class="text-sm text-danger font-medium">Delete category</div>
              <div class="text-sm text-default-800">Are you sure you want to delete <strong>${escapeHtml(name)}</strong>? This action cannot be undone.</div>
            </div>
            <div class="flex items-center gap-2">
              <button id="confirm-delete" class="inline-block py-2 px-3 bg-danger text-white rounded">Delete</button>
              <button id="cancel-delete" class="inline-block py-2 px-3 bg-gray-200 text-default-800 rounded">Cancel</button>
            </div>
          </div>
        </div>
      `;

      placeholder.insertAdjacentHTML('afterbegin', html);

      const confirm = document.getElementById('confirm-delete');
      const cancel = document.getElementById('cancel-delete');

      confirm.addEventListener('click', function () {
        form.submit();
      });

      cancel.addEventListener('click', function () {
        const el = document.getElementById(id);
        if (el) el.remove();
      });
    }

    function escapeHtml(unsafe) {
      return unsafe
        .replaceAll('&', '&amp;')
        .replaceAll('<', '&lt;')
        .replaceAll('>', '&gt;')
        .replaceAll('"', '&quot;')
        .replaceAll("'", '&#039;');
    }

    document.addEventListener('click', function (e) {
      if (e.target && e.target.matches('.btn-delete')) {
        const btn = e.target;
        const form = btn.closest('.delete-form');
        const name = btn.getAttribute('data-name') || 'this item';
        if (form) {
          showDeleteConfirm(form, name);
        }
      }
    });
  })();
</script>
@endpush
