<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register — {{ config('app.name', 'Travesta') }}</title>
    <!-- Favicon for auth pages -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth-register.css') }}">
</head>

<body>
    <main class="auth-hero">
        <div class="auth-card">
            <div class="mb-4">
                <h1 class="text-2xl font-semibold">Travesta.</h1>
                <p class="text-sm text-default-700">Create your account to manage destination.</p>
            </div>

            <form method="POST" action="{{ route('register.post') }}">
                @csrf

                <div class="mb-3">
                    <label class="text-default-800 text-sm font-medium inline-block mb-2">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="form-input w-full"
                        placeholder="Full name">
                    @error('name')<div class="text-danger text-sm mt-1">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="text-default-800 text-sm font-medium inline-block mb-2">Email address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="form-input w-full"
                        placeholder="Enter email">
                    @error('email')<div class="text-danger text-sm mt-1">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="text-default-800 text-sm font-medium inline-block mb-2">Password</label>
                    <input id="password" type="password" name="password" required class="form-input w-full"
                        placeholder="Password">
                    @error('password')<div class="text-danger text-sm mt-1">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="text-default-800 text-sm font-medium inline-block mb-2">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="form-input w-full" placeholder="Confirm password">
                    <div id="password-match" class="text-sm mt-1"></div>
                    @error('password_confirmation')<div class="text-danger text-sm mt-1">{{ $message }}</div>@enderror
                </div>

                <div class="mb-4">
                    <button id="register-submit" class="btn w-full bg-primary text-white">Create account</button>
                </div>

                <div class="text-center text-sm opacity-80">
                    Already registered? <a href="{{ route('login') }}" class="text-primary">Sign in</a>
                </div>
            </form>
        </div>
    </main>

    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        (function () {
            const pw = document.getElementById('password');
            const pwc = document.getElementById('password_confirmation');
            const msg = document.getElementById('password-match');
            const submit = document.getElementById('register-submit');

            function check() {
                if (!pw || !pwc) return;
                if (pwc.value === '') {
                    msg.textContent = '';
                    submit.disabled = false;
                    return;
                }
                if (pw.value === pwc.value) {
                    msg.textContent = 'Passwords match.';
                    msg.className = 'text-success text-sm mt-1';
                    submit.disabled = false;
                } else {
                    msg.textContent = 'The password confirmation does not match.';
                    msg.className = 'text-danger text-sm mt-1';
                    submit.disabled = true;
                }
            }

            pw && pw.addEventListener('input', check);
            pwc && pwc.addEventListener('input', check);
        })();
    </script>
</body>

</html>