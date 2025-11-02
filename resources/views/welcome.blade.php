<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="refresh" content="0;url={{ route('login') }}" />
    <title>Redirecting…</title>
</head>

<body>
    <p>Redirecting to <a href="{{ route('login') }}">login</a>...</p>
    <script>window.location.replace("{{ route('login') }}");</script>
</body>

</html>