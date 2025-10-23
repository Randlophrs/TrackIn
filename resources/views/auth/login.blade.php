<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrackIn - Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div>
        @extends('layouts.popup')
    </div>

    <div class="flex h-screen">
        <div class="w-1/2 relative">
            <img src="{{ asset('images/warehouse.png')}}" alt="Warehouse" class="object-cover w-full h-full">
        </div>

        <div class="w-1/2 bg-[#5260F0] flex items-center justify-center text-[#FFF6F4]">
            <div class="w-full max-w-md px-8 pb-40">
                <div class="justify-center text-center">
                    <h1 class="text-[48px] font-bold mb-2">Selamat Datang</h1>
                    <p class="mb-6 text-[24px]">Silahkan Login</p>
                </div>
                <form action="{{ route('login') }}" method="POST" class="pt-16">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-1 text-xl font-bold">Email</label>
                        <input name="email" type="email"
                            class="w-full px-4 py-2 rounded bg-[#FFF6F4] text-[#170A1C] focus:outline-none"
                            placeholder="Email">
                    </div>

                    <div class="mb-2">
                        <label class="block mb-1 text-xl font-bold">Password</label>
                        <input name="password" type="password"
                            class="w-full px-4 py-2 rounded bg-[#FFF6F4] text-[#170A1C] focus:outline-none"
                            placeholder="Password">
                    </div>


                    <button type="submit"
                        class="text-xl w-full bg-[#f87d1c] hover:bg-[#F86F03] text-[#FFF6F4] py-2 rounded-md font-semibold mt-5 transition duration-300 ease-in-out cursor-pointer">Masuk</button>
                </form>
                <p class="mt-6 text-xl text-center">
                    Belum Punya Akun ? <a href="{{ route('register') }}"
                        class="underline hover:text-[#F86F03] transition duration-300 ease-in-out">Daftar</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>