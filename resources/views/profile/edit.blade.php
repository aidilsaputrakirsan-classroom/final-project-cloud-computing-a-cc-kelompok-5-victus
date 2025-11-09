@extends('layouts.admin.admin')

@section('title', 'Edit Profile')

@section('content')
    <div class="md:flex md:items-center md:justify-between mb-6">
        <h1 class="text-2xl font-semibold">Profile</h1>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Your Profile</h4>
        </div>
        <form id="profile-edit-form" action="{{ route('profile.update') }}" method="POST" class="bg-white p-6 rounded">
            @method('PUT')
            @include('profile._form')
        </form>
    </div>

    {{-- Danger zone: delete account card --}}
    <div class="card mt-6 border-red-100">
        <div class="card-header">
            <h4 class="card-title text-red-600">Danger Zone</h4>
        </div>
        <div class="bg-white p-6 rounded">
            <p class="mb-4 text-sm text-default-600">Deleting your account will remove your user record permanently. This
                action cannot be undone.</p>

            <form id="delete-profile-form" action="{{ route('profile.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" id="btn-delete-profile"
                    class="inline-block py-2 px-4 bg-danger text-white rounded">Delete Account</button>
            </form>
        </div>
    </div>

@endsection