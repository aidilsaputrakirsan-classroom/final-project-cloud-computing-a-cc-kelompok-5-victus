@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
  <div class="md:flex md:items-center md:justify-between mb-6">
    <h1 class="text-2xl font-semibold">Categories</h1>
    <a href="{{ route('categories.create') }}" class="inline-block py-2 px-4 bg-primary text-white rounded">New Category</a>
  </div>

  <div class="card overflow-hidden">
    <div class="card-header">
      <h4 class="card-title">Categories</h4>
    </div>

    <div>
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
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $cat->is_active ? 'Yes' : 'No' }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $cat->posts_count }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                    <a href="{{ route('categories.edit', $cat) }}" class="text-primary hover:text-sky-700 mr-3">Edit</a>
                    <form action="{{ route('categories.destroy', $cat) }}" method="POST" class="inline" onsubmit="return confirm('Delete category?');">
                      @csrf
                      @method('DELETE')
                      <button class="text-red-600 hover:text-red-900">Delete</button>
                    </form>
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
