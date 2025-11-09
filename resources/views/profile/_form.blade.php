@csrf

<!-- Client-side validation placeholder (populated by JS) -->
<div id="client-validation-errors" class="mb-4 text-red-700 bg-red-100 p-3 rounded hidden" role="alert"></div>

@if($errors->any())
    <div class="mb-4 text-red-700 bg-red-100 p-3 rounded">
        <strong class="block">Please fix the validation errors:</strong>
        <ul class="mt-2 list-disc list-inside text-sm">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid lg:grid-cols-2 gap-6">
    <div>
        <label class="text-default-800 text-sm font-medium inline-block mb-2">Name</label>
        <input type="text" name="name" class="form-input" value="{{ old('name', $user->name ?? '') }}" required
            autofocus>
        @error('name')
            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label class="text-default-800 text-sm font-medium inline-block mb-2">Email</label>
        <input type="email" name="email" class="form-input" value="{{ old('email', $user->email ?? '') }}" required>
        @error('email')
            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label class="text-default-800 text-sm font-medium inline-block mb-2">Password</label>
        <input type="password" name="password" class="form-input" autocomplete="new-password" required>
        @error('password')
            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label class="text-default-800 text-sm font-medium inline-block mb-2">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-input" autocomplete="new-password" required>
        @error('password_confirmation')
            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="lg:col-span-2">
        <button class="inline-block py-2 px-4 bg-primary text-white rounded">Save</button>
    </div>
</div>