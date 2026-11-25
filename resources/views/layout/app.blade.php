<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Surat')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100">

    <header class="bg-blue-800 text-white px-6 py-6 shadow-md">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-4">

            <div>
                <h2 class="text-3xl font-bold text-white mb-3">
                    Sistem Informasi Surat
                </h2>

                <nav class="flex flex-wrap gap-5">
                    <a href="{{ route('dashboard') }}" class="text-white font-semibold hover:text-blue-200">Dashboard</a>
                    <a href="{{ route('surat-masuk.index') }}" class="text-white font-semibold hover:text-blue-200">Surat Masuk</a>
                    <a href="{{ route('surat-keluar.index') }}" class="text-white font-semibold hover:text-blue-200">Surat Keluar</a>
                </nav>
            </div>

            @auth
                <div class="text-right">
                    <p class="text-white">
                        Login sebagai:
                        <strong>{{ auth()->user()->name }}</strong>
                        ({{ auth()->user()->role }})
                    </p>

                    <form action="{{ route('logout') }}" method="POST" class="mt-3">
                        @csrf
                        <button type="submit" class="bg-white text-blue-800 hover:bg-blue-100 px-4 py-2 rounded-lg font-semibold">
                            Logout
                        </button>
                    </form>
                </div>
            @endauth

        </div>
    </header>

    <main class="max-w-7xl min-h-[350px] mx-auto my-8 px-6 py-8 bg-white rounded-xl shadow-sm">
        @yield('content')
    </main>

    <footer class="text-center text-slate-500 py-5">
        <p>&copy; 2026 Sistem Informasi Surat</p>
    </footer>

</body>
</html>
