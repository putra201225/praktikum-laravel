<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Surat</title>
</head>
<body>

    <h2>Login Sistem Informasi Surat</h2>

    @if ($errors->any())
        <p style="color: red;">
            {{ $errors->first() }}
        </p>
    @endif

    <form action="{{ url('/login') }}" method="POST">
        @csrf

        <div>
            <label for="email">Email</label><br>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="password">Password</label><br>
            <input
                type="password"
                id="password"
                name="password"
                required
            >
        </div>

        <br>

        <button type="submit">Login</button>
    </form>

</body>
</html>
