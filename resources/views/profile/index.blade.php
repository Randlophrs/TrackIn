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
                    <img src="{{asset('images/profiles/' . $user->profile_picture)}}" alt="" class="w-24 h-24 rounded-full">

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
                                autocomplete="new-password" class="text-xl pr-[161px] focus:outline-none" readonly
                                autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="flex gap-8">
                    <button type="submit"
                        class="px-4 py-2 text-xl bg-[#FF8811] text-[#FDFFFC] rounded-md hover:bg-[#FF6C11] hover:cursor-pointer transition duration-300 ease-in-out">Simpan
                        perubahan</button>
                </div>
            </div>
        </form>

        <a href="{{route('logout')}}" class="bg-[#C32F27] text-[#FDFFFC] text-2xl fixed bottom-0 right-0 px-8 py-2 m-6 rounded-md">
            <div class="flex gap-5 items-center">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_224_2167)">
                        <path
                            d="M22.8293 9.17192L18.9503 5.29292C18.7617 5.11076 18.5091 5.00997 18.2469 5.01224C17.9847 5.01452 17.7338 5.11969 17.5484 5.3051C17.363 5.49051 17.2579 5.74132 17.2556 6.00352C17.2533 6.26571 17.3541 6.51832 17.5363 6.70692L21.4153 10.5859C21.5305 10.7034 21.6312 10.8344 21.7153 10.9759C21.7003 10.9759 21.6883 10.9679 21.6733 10.9679L5.98926 10.9999C5.72404 10.9999 5.46969 11.1053 5.28215 11.2928C5.09461 11.4803 4.98926 11.7347 4.98926 11.9999C4.98926 12.2651 5.09461 12.5195 5.28215 12.707C5.46969 12.8946 5.72404 12.9999 5.98926 12.9999L21.6673 12.9679C21.6953 12.9679 21.7183 12.9539 21.7453 12.9519C21.6566 13.1211 21.5441 13.2767 21.4113 13.4139L17.5323 17.2929C17.4367 17.3852 17.3606 17.4955 17.3082 17.6175C17.2557 17.7395 17.2282 17.8707 17.227 18.0035C17.2259 18.1363 17.2512 18.268 17.3014 18.3909C17.3517 18.5138 17.426 18.6254 17.5199 18.7193C17.6138 18.8132 17.7254 18.8875 17.8483 18.9377C17.9712 18.988 18.1029 19.0133 18.2357 19.0122C18.3684 19.011 18.4997 18.9834 18.6217 18.931C18.7437 18.8786 18.854 18.8024 18.9463 18.7069L22.8253 14.8279C23.5751 14.0778 23.9964 13.0606 23.9964 11.9999C23.9964 10.9393 23.5751 9.92203 22.8253 9.17192H22.8293Z"
                            fill="#FDFFFC" />
                        <path
                            d="M7 22H5C4.20435 22 3.44129 21.6839 2.87868 21.1213C2.31607 20.5587 2 19.7956 2 19V5C2 4.20435 2.31607 3.44129 2.87868 2.87868C3.44129 2.31607 4.20435 2 5 2H7C7.26522 2 7.51957 1.89464 7.70711 1.70711C7.89464 1.51957 8 1.26522 8 1C8 0.734784 7.89464 0.48043 7.70711 0.292893C7.51957 0.105357 7.26522 0 7 0L5 0C3.67441 0.00158786 2.40356 0.528882 1.46622 1.46622C0.528882 2.40356 0.00158786 3.67441 0 5L0 19C0.00158786 20.3256 0.528882 21.5964 1.46622 22.5338C2.40356 23.4711 3.67441 23.9984 5 24H7C7.26522 24 7.51957 23.8946 7.70711 23.7071C7.89464 23.5196 8 23.2652 8 23C8 22.7348 7.89464 22.4804 7.70711 22.2929C7.51957 22.1054 7.26522 22 7 22Z"
                            fill="#FDFFFC" />
                    </g>
                    <defs>
                        <clipPath id="clip0_224_2167">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                Keluar
            </div>
        </a>
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