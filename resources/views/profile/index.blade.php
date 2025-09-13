@extends('layouts.app')

@section('title', 'TrackIn - Profile')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center">
            <h1 class="text-[40px] font-bold">Profil</h1>
        </div>

        <h1 class="text-[20px]">Perbarui foto dan data diri anda disini.</h1>

        <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data" class="mt-2">
            @csrf
            <div class="gap-6 flex flex-col">
                <div class="flex mt-10 items-center gap-6">
                    <img src="{{asset('images/profiles/' . $user->profile_picture)}}" alt=""
                        class="w-24 h-24 rounded-full">

                    <div class="flex flex-col">
                        <h1 class="text-2xl font-bold">Foto profil</h1>
                        <input type="file" name="profile_picture" id="profile_picture"
                            class="border border-gray-300 rounded-md p-2 cursor-pointer" placeholder="Ubah Profile">
                    </div>
                </div>

                <div class="flex gap-24">

                    <div class="flex flex-col justify-between gap-2">
                        <h1 class="text-2xl font-bold">Nama lengkap</h1>

                        <div class="flex border-gray-300 border pl-4 py-2 rounded-md w-max" id="fieldName">
                            <input type=" text" name="name" id="inputName" class="text-xl pr-24 focus:outline-none"
                                value="{{$user->name}}" readonly autocomplete="off">

                            <div class="border-l border-gray-300 px-4 hover:cursor-pointer" onclick="toggleEditName()">
                                <img src="{{asset('images/icons/pencil-icon.png')}}" alt="image" class="h-8 w-8">
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <h1 class="text-2xl font-bold">Email</h1>

                        <div class="flex border-gray-300 border pl-4 py-2 rounded-md w-max" id="fieldEmail">
                            <input type="text" name="email" id="inputEmail" class="text-xl pr-24 focus:outline-none"
                                value="{{$user->email}}" readonly autocomplete="off">

                            <div class="border-l border-gray-300 px-4 hover:cursor-pointer" onclick="toggleEditEmail()">
                                <img src="{{asset('images/icons/pencil-icon.png')}}" alt="image" class="h-8 w-8">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex mt-8">
                    <h1 class="text-2xl font-bold">Ubah Kata sandi</h1>
                    <div class="px-4 hover:cursor-pointer" onclick="toggleEditPassword()">
                        <img src="{{asset('images/icons/pencil-icon.png')}}" alt="image" class="h-8 w-8">
                    </div>
                </div>

                <div class="flex gap-24 mt-[-12px]" id="changePassword">
                    <div class="flex flex-col gap-2">
                        <h1 class="text-2xl">Kata sandi lama</h1>
                        <div class="flex border-gray-300 border pl-4 py-2 rounded-md w-max" id="fieldOldPassword">
                            <input type="password" name="oldpassword" id="inputOldPassword" autocomplete="new-password"
                                class="text-xl pr-[161px] focus:outline-none" readonly autocomplete="off">
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <h1 class="text-2xl">Kata sandi baru</h1>
                        <div class="flex border-gray-300 border pl-4 py-2 rounded-md w-max" id="fieldNewPassword">
                            <input type="password" name="newpassword_confirmation" id="inputNewPassword"
                                autocomplete="new-password" class="text-xl pr-[161px] focus:outline-none" readonly autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="flex gap-8">
                    <button type="submit"
                        class="px-4 py-2 text-xl bg-orange-500 text-white rounded-md hover:bg-orange-600 hover:cursor-pointer transition duration-300 ease-in-out">Simpan
                        perubahan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function toggleEditName() {
            let editName = document.getElementById('inputName');

            if (editName.hasAttribute("readonly")) {
                editName.removeAttribute("readonly");
                document.getElementById('fieldName').classList.remove('border-gray-300');
                document.getElementById('fieldName').classList.add('border-[#FF8811]');
            } else {
                editName.setAttribute("readonly", true);
                document.getElementById('fieldName').classList.remove('border-[#FF8811]');
                document.getElementById('fieldName').classList.add('border-gray-300');
            }
        }

        function toggleEditEmail() {
            let editEmail = document.getElementById('inputEmail');

            if (editEmail.hasAttribute("readonly")) {
                editEmail.removeAttribute("readonly");
                document.getElementById('fieldEmail').classList.remove('border-gray-300');
                document.getElementById('fieldEmail').classList.add('border-[#FF8811]');
            } else {
                editEmail.setAttribute("readonly", true);
                document.getElementById('fieldEmail').classList.remove('border-[#FF8811]');
                document.getElementById('fieldEmail').classList.add('border-gray-300');
            }
        }

        function toggleEditPassword() {
            let editOldPassword = document.getElementById('inputOldPassword');
            let editNewPassword = document.getElementById('inputNewPassword');

            if (editOldPassword.hasAttribute("readonly") && editNewPassword.hasAttribute("readonly")) {
                editOldPassword.removeAttribute("readonly");
                document.getElementById('fieldOldPassword').classList.remove('border-gray-300');
                document.getElementById('fieldOldPassword').classList.add('border-[#FF8811]');

                editNewPassword.removeAttribute("readonly");
                document.getElementById('fieldNewPassword').classList.remove('border-gray-300');
                document.getElementById('fieldNewPassword').classList.add('border-[#FF8811]');
            } else {
                editOldPassword.setAttribute("readonly", true);
                document.getElementById('fieldOldPassword').classList.remove('border-[#FF8811]');
                document.getElementById('fieldOldPassword').classList.add('border-gray-300');

                editNewPassword.setAttribute("readonly", true);
                document.getElementById('fieldNewPassword').classList.remove('border-[#FF8811]');
                document.getElementById('fieldNewPassword').classList.add('border-gray-300');
            }
        }
    </script>

@endsection