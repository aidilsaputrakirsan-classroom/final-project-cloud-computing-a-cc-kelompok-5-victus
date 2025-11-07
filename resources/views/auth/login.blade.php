<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login — {{ config('app.name', 'Travesta') }}</title>
    <!-- Favicon for auth pages -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth-login.css') }}">
</head>

<body>
    <main class="login-hero">
        <div class="login-card mx-4">
            <div class="login-illustration p-2 overflow-hidden">
                <img src="{{ asset('assets/images/illustration-form.png') }}" alt="Illustration"
                    class="mx-auto my-auto w-11/12 h-11/12 object-contain rounded-lg">
            </div>

            <div class="login-form">
                @if(session('status'))
                    <div class="alert alert-success mb-4">{{ session('status') }}</div>
                @endif

                <div class="mb-6">
                    <h1 class="text-4xl font-bold text-center">Travesta.</h1>
                </div>

                <h3 class="text-xl font-semibold mb-4">Sign in to your account</h3>

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="text-default-800 text-sm font-medium inline-block mb-2">Email address</label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="form-input w-full"
                            placeholder="Enter email">
                        @error('email')<div class="text-danger text-sm mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="text-default-800 text-sm font-medium inline-block mb-2">Password</label>
                        <input type="password" name="password" required class="form-input w-full"
                            placeholder="Password">
                        @error('password')<div class="text-danger text-sm mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="flex items-center justify-between mb-4">
                        <label class="flex items-center gap-2 text-sm">
                            <input type="checkbox" name="remember" class="form-checkbox">
                            <span class="opacity-80">Remember me</span>
                        </label>
                        <a href="#" class="text-sm">Forgot password?</a>
                    </div>

                    <div class="mb-4">
                        <button class="btn w-full bg-primary text-white">Sign In</button>
                    </div>

                    <div class="text-center text-sm opacity-80">
                        Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create one</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>