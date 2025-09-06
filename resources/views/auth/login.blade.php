<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Gudang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <div class="w-1/2 bg-blue-700 flex items-center justify-center text-white ">
            <div class="w-full max-w-md px-8 pb-40">
                <div class="justify-center text-center">
                    <h1 class="text-[48px] font-bold mb-2">Selamat Datang</h1>
                    <p class="mb-6 text-[24px]">Silahkan Login</p>
                </div>
                <form action="{{ route('login-post') }}" method="POST" class="pt-16">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-1 text-base">Email</label>
                        <input name="email" type="email"
                            class="w-full px-4 py-2 rounded bg-white text-black focus:outline-none" placeholder="Email">
                    </div>

                    <div class="mb-2">
                        <label class="block mb-1 text-base">Password</label>
                        <input name="password" type="password"
                            class="w-full px-4 py-2 rounded bg-white text-black focus:outline-none"
                            placeholder="Password">
                        @error('password')
                            <div style="font-size: 14px;" class="text-red-500">{{ $message }}</div>
                        @enderror
                        @error('email')
                            <div style="font-size: 14px;" class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- <div class="text-right mb-4">
                        <a href="#" class="text-base underline hover:text-orange-300">Forgot Password</a>
                    </div> --}}

                    <button type="submit"
                        class="text-base w-full bg-orange-500 hover:bg-orange-600 text-white py-2 rounded-xl font-semibold mt-5" >LogIn</button>
                </form>
                <p class="mt-6 text-base text-center">
                    Belum Punya Akun ? <a href="{{ route('register') }}"
                        class="underline hover:text-orange-300">Register</a>
                </p>
            </div>
        </div>

        <!-- Right: Warehouse Image -->
        <div class="w-1/2 relative">
            <img src="{{ asset('images/warehouse.png')}}" alt="Warehouse" class="object-cover w-full h-full">
        </div>
    </div>
</body>

</html>