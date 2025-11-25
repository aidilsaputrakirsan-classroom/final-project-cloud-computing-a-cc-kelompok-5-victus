@extends('layouts.admin.admin')

@section('title', 'Activity Logs')

@section('content')
    <div class="md:flex md:items-center md:justify-between mb-6">
        <h1 class="text-2xl font-semibold">Activity Logs</h1>

        <form action="{{ route('admin.activitylogs.index') }}" method="get" class="flex items-center gap-2">
            <input type="search" name="q" class="form-control" placeholder="Search action, description or user" value="{{ request('q') }}">
            <button class="btn btn-sm bg-primary text-white">Search</button>
        </form>
    </div>

    <div class="card overflow-hidden">
        <div class="card-header">
            <h4 class="card-title">Recent Activity</h4>
        </div>

        <div class="overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-start text-sm text-default-500">#</th>
                                <th class="px-6 py-3 text-start text-sm text-default-500">User</th>
                                <th class="px-6 py-3 text-start text-sm text-default-500">Action</th>
                                <th class="px-6 py-3 text-start text-sm text-default-500">Description</th>
                                <th class="px-6 py-3 text-start text-sm text-default-500">IP</th>
                                <th class="px-6 py-3 text-start text-sm text-default-500">When</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @forelse ($logs as $log)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">{{ $log->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ optional($log->user)->name ?? 'System' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $log->action }}</td>
                                    <td class="px-6 py-4 text-sm text-default-800" style="max-width:420px; white-space:pre-wrap; word-break:break-word;">{{ \Illuminate\Support\Str::limit($log->description, 300) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $log->ip_address }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">{{ $log->created_at->format('Y-m-d H:i') }}<br><small class="text-default-500">{{ $log->created_at->diffForHumans() }}</small></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-sm text-default-800">No activity logs found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="p-4">
            @if ($logs instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $logs->links() }}
            @endif
        </div>
    </div>

@endsection

