
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Surat')</title>

    <style>
        form label {
            display: inline-block;
            width: 130px;
        }

        form input,
        form textarea {
            vertical-align: middle;
            width: 170px;
            box-sizing: border-box;
        }

        form input[type="text"],
        form input[type="date"],
        form textarea {
            box-sizing: border-box;
        }
    </style>
</head>
<body>

    <header>
        <h2>Sistem Informasi Surat</h2>

        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a> |
            <a href="{{ route('surat-masuk.index') }}">Surat Masuk</a> |
            <a href="{{ route('surat-keluar.index') }}">Surat Keluar</a>
        </nav>

        @auth
            <p>
                Login sebagai:
                <strong>{{ auth()->user()->name }}</strong>
                ({{ auth()->user()->role }})
            </p>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth

        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <hr>
        <p>&copy; 2026 Sistem Informasi Surat</p>
    </footer>

</body>
</html>
