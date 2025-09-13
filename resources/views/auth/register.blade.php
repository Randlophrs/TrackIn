<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrackIn - Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div>
        @extends('layouts.popup')
    </div>

    <div class="flex h-screen">
        <div class="w-1/2 bg-[#5260F0] flex items-center justify-center text-[#FDFFFC]">
            <div class="w-full max-w-md px-8 pb-40">
                <div class="justify-center text-center">
                    <h1 class="text-[48px] font-bold mb-2">Selamat Datang</h1>
                    <p class="mb-6 text-[24px]">Isi data di bawah untuk mendaftar</p>
                </div>
                <form action="{{ route('register-post') }}" method="POST" class="pt-16">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-1 text-xl">Nama </label>
                        <input name="name" type="text"
                            class="w-full px-4 py-2 rounded bg-[#FDFFFC] text-[#170A1C] focus:outline-none"
                            placeholder="Nama lengkap" autocomplete="off">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-xl">Email</label>
                        <input name="email" type="email"
                            class="w-full px-4 py-2 rounded bg-[#FDFFFC] text-[#170A1C] focus:outline-none"
                            placeholder="Email" autocomplete="off">
                    </div>

                    <div class="mb-2">
                        <label class="block mb-1 text-xl">Password</label>
                        <input name="password" type="password"
                            class="w-full px-4 py-2 rounded bg-[#FDFFFC] text-[#170A1C] focus:outline-none"
                            placeholder="Password" autocomplete="new-password">
                    </div>

                    <div class="mb-2">
                        <label class="block mb-1 text-xl">Konfirmasi password</label>
                        <input name="password_confirmation" type="password"
                            class="w-full px-4 py-2 rounded bg-[#FDFFFC] text-[#170A1C] focus:outline-none"
                            placeholder="Password" autocomplete="off">
                    </div>

                    <button type="submit"
                        class="text-xl w-full bg-[#FF8811] hover:bg-[#FF6C11] text-[#FDFFFC] py-2 rounded-md font-semibold mt-5 transition duraiton-300 ease-in-out">Regsiter</button>
                </form>
                <p class="mt-6 text-xl text-center">
                    Sudah Punya Akun ? <a href="{{ route('login') }}" class="underline hover:text-[#FF6C11] transition duraiton-300 ease-in-out">Masuk</a>
                </p>
            </div>
        </div>

        <div class="w-1/2 relative">
            <img src="{{ asset('images/warehouse.png')}}" alt="Warehouse" class="object-cover w-full h-full">
        </div>
    </div>
</body>

</html>