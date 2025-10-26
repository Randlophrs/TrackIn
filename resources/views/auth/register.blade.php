<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrackIn - Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @extends('layouts.particles')

    <div class="flex fixed m-8 items-center">
        <img src="{{ asset('images/icons/TrackIn-Logo.png') }}" alt="TrackIn" width="64px" height="64px">
        <p class="text-4xl text-white">TrackIn</p>
    </div>

    <div class="flex h-screen">
        <div class="flex w-1/2 bg-indigo-500 justify-center items-center">
            <div id="warehouse-icon"></div>
        </div>

        <div class="w-1/2 flex justify-center items-center">
            <div class="w-3/5 max-w-md px-4 py-6 bg-white border-1 border-gray-200 rounded-2xl drop-shadow-2xl drop-shadow-gray-200">
                <h2 class="text-4xl font-bold mb-2 text-gray-900">Selamat Datang</h2>
                <p class="text-lg text-gray-500 mb-6">Silahkan Daftar</p>

                <form action="{{ route('register') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-gray-700">Nama</label>
                        <input type="text" name="name" id="namme" required
                            class="mt-1 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 border-gray-500">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" name="email" id="email" required
                            class="mt-1 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 border-gray-500">
                    </div>
                    <div>
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="password" name="password" id="password" required
                            class="mt-1 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 border-gray-500">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-gray-700">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            class="mt-1 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 border-gray-500">
                    </div>
                    {{-- <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="remember" class="h-4 w-4">
                            Remember me
                        </label>
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">Forgot
                            Password</a>
                    </div> --}}

                    <button type="submit"
                        class="text-lg w-full bg-indigo-500 text-white py-2 rounded-lg hover:bg-indigo-600 cursor-pointer transition">
                        Daftar
                    </button>

                    <p class="text-lg text-center text-gray-500 mt-4">
                        Sudah memiliki akun? <a href="{{ route('login') }}"
                            class="text-blue-600 hover:underline">Masuk</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/lottie.min.js') }}"></script>
    <script>
        lottie.loadAnimation({
            container: document.getElementById('warehouse-icon'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: '{{ asset('animated/login-warehouse.json') }}'
        });
    </script>
</body>

</html>