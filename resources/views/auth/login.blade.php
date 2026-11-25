<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Surat</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-blue-50 flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white rounded-xl shadow-lg border border-blue-200 overflow-hidden">

        <!-- Judul -->
        <div class="bg-blue-700 px-6 py-6 text-center">
            <h2 class="text-2xl font-bold text-white">
                Login Sistem Informasi Surat
            </h2>

            <p class="text-blue-100 text-sm mt-2">
                Silakan masuk ke akun Anda
            </p>
        </div>

        <!-- Form Login -->
        <div class="p-6 md:p-8">

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg p-3 mb-5">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-semibold text-blue-900 mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        required
                        class="w-full border border-blue-200 bg-blue-50 rounded-lg px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    >
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-blue-900 mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                        class="w-full border border-blue-200 bg-blue-50 rounded-lg px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    >
                </div>

                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow-sm transition"
                >
                    Login
                </button>
            </form>

        </div>

        <!-- Footer -->
        <div class="bg-blue-50 border-t border-blue-100 text-center py-4">
            <p class="text-sm text-gray-500">
                &copy; 2026 Sistem Informasi Surat
            </p>
        </div>

    </div>

</body>
</html>
