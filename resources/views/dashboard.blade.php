<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - LendEase</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/img/Avatar.png') }}">

    <!-- Flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    {{-- Link Laraval --}}
    <link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">
</head>

<body>
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-9 h-9" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform bg-[#F4F4F4] -translate-x-full sm:translate-x-0 shadow-xl"
        aria-label="Sidebar">
        <div class="h-full flex flex-col justify-normal px-4 py-12 overflow-y-auto bg-gray-50">
            <!-- Logo -->
            <a href="#" class="flex items-center ps-2.5 mb-10">
                <img src="{{ asset('assets/img/logo.jpg') }}" class="h-6 me-3 sm:h-7" alt="LendEase Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap">LendEase</span>
            </a>
            @if (auth()->user()->role === 'admin')
                <ul class="space-y-2 py-4 font-medium">
                    <li>
                        <a href="#" class="flex items-center p-2 text-white rounded-lg bg-[#50790B] group">
                            <svg class="w-5 h-5 text-white transition duration-75 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('items') }}"
                            class="flex items-center p-2 text-gray-900 hover:text-white rounded-lg hover:bg-[#50790B] group">
                            <svg class="flex-shrink-0 w-5 h-5 text-[#50790B] transition duration-75 group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 18 18">
                                <path
                                    d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Inventaris</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pinjamBarang') }}"
                            class="flex items-center p-2 text-gray-900 hover:text-white rounded-lg hover:bg-[#50790B] group">
                            <svg class="flex-shrink-0 w-5 h-5 text-[#50790B] transition duration-75 group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Peminjaman</span>
                            <!-- <span
                                class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span> -->
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users') }}"
                            class="flex items-center p-2 text-gray-900 hover:text-white rounded-lg hover:bg-[#50790B] group">
                            <svg class="flex-shrink-0 w-5 h-5 text-[#50790B] transition duration-75 group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 18">
                                <path
                                    d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">List User</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logs') }}"
                            class="flex items-center p-2 text-gray-900 hover:text-white rounded-lg hover:bg-[#50790B] group">
                            <svg class="flex-shrink-0 w-5 h-5 text-[#50790B] transition duration-75 group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 512 512">
                                <path d="M64 480H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H288c-10.1 0-19.6-4.7-25.6-12.8L243.2 57.6C231.1 41.5 212.1 32 192 32H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64z"/>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Log Aktivitas</span>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}"
                            class="flex items-center p-2 text-gray-900 hover:text-white rounded-lg hover:bg-red-600 group">
                            @csrf
                            <svg
                                class="flex-shrink-0 w-5 h-5 text-[#50790B] transition duration-75 group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 512 512">
                                <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                            </svg>
                            <button type="submit" class="flex-1 ms-3 text-left whitespace-nowrap">Logout</button>
                        </form>
                    </li>
                </ul>
            @elseif (auth()->user()->role === 'user')
                <ul class="space-y-2 py-4 font-medium">
                    <li>
                        <a href="#" class="flex items-center p-2 text-white rounded-lg bg-[#50790B] group">
                            <svg class="w-5 h-5 text-white transition duration-75 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pinjamBarang') }}"
                            class="flex items-center p-2 text-gray-900 hover:text-white rounded-lg hover:bg-[#50790B] group">
                            <svg class="flex-shrink-0 w-5 h-5 text-[#50790B] transition duration-75 group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Peminjaman</span>
                            <!-- <span
                            class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span> -->
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logs') }}"
                            class="flex items-center p-2 text-gray-900 hover:text-white rounded-lg hover:bg-[#50790B] group">
                            <svg class="flex-shrink-0 w-5 h-5 text-[#50790B] transition duration-75 group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 512 512">
                                <path d="M64 480H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H288c-10.1 0-19.6-4.7-25.6-12.8L243.2 57.6C231.1 41.5 212.1 32 192 32H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64z"/>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Log Aktivitas</span>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}"
                            class="flex items-center p-2 text-gray-900 hover:text-white rounded-lg hover:bg-red-600 group">
                            @csrf
                            <svg
                                class="flex-shrink-0 w-5 h-5 text-[#50790B] transition duration-75 group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 512 512">
                                <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                            </svg>
                            <button type="submit" class="flex-1 ms-3 text-left whitespace-nowrap">Logout</button>
                        </form>
                    </li>
                </ul>
            @endif
        </div>
    </aside>

    <!-- Content -->
    <div class="sm:ml-64 bg-[#EEEEEE] pb-5">
        <div class="rounded-lg">
            <div class="flex flex-col items-start justify-start px-4 py-4 h-72 mb-4 bg-[#50790B]">
                <p class="text-md text-white">
                    Pages / Home
                </p>
                <p class="text-lg font-bold text-white">
                    Home
                </p>
            </div>
            <div
                class="flex flex-col lg:flex-row items-center justify-around gap-7 mx-10 -mt-36 mb-4 rounded-2xl bg-white">
                <div class="flex flex-col gap-6 justify-start items-start p-8 lg:p-0">
                    <h1 class="text-3xl font-bold pt-4">Welcome, {{ auth()->user()->name }}!</h1>
                    <p class="text-lg font-medium">
                        LendEase is an application designed to streamline the inventory
                        management process, from recording to updating stock items
                    </p>
                    <a href="/items" class="bg-[#50790B] text-white font-bold px-8 py-2 rounded-xl mb-4">
                        Lihat Semua Barang
                    </a>
                </div>
                <img src="{{ asset('assets/img/welcome-bar.png') }}" alt="" width="260">
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-{{ auth()->user()->role === ('user') ? '2' : '3' }} gap-8 mb-4 mx-10">
                @if (auth()->user()->role === 'admin')
                    <div
                        class="flex flex-col lg:flex-row gap-3 lg:gap-0 items-center justify-around p-6 rounded-lg bg-[#A4C639]">
                        <div class="flex flex-col justify-between items-center lg:items-start">
                            <h2 class="text-xl lg:text-2xl font-semibold text-white text-center">
                                Seluruh Barang
                            </h2>
                            <p class="text-2xl lg:text-3xl font-bold text-white">
                                {{ $items->count() }}
                            </p>
                        </div>
                        <div class="p-4 bg-[#EEEEEE] rounded-lg">
                            <svg width="46" height="46" viewBox="0 0 42 42" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.0627 0C2.73571 0 0 2.75099 0 6.07673V35.9233C0 39.249 2.73571 42 6.0627 42H35.9373C39.2643 42 42 39.249 42 35.9233V6.07673C42 2.75099 39.2643 0 35.9373 0H6.0627ZM6.0627 4.20288H14.6973V18.9068C14.7125 20.7659 16.9592 21.6894 18.2783 20.3788L21.0103 17.6685L23.7217 20.3788C25.0408 21.6894 27.2875 20.7659 27.3027 18.9068V4.20288H35.9373C36.9942 4.20288 37.7996 5.02024 37.7996 6.07673V35.9233C37.7996 36.9798 36.9942 37.8012 35.9373 37.8012H6.0627C5.00578 37.8012 4.20451 36.9798 4.20451 35.9233V6.07673C4.20451 5.02024 5.00578 4.20288 6.0627 4.20288ZM18.8977 4.20288H23.1023V13.8387L22.4829 13.2196C21.6636 12.4055 20.3405 12.4055 19.5212 13.2196L18.8977 13.8387L18.8977 4.20288Z"
                                    fill="#1B1833" />
                            </svg>
                        </div>
                    </div>
                @endif
                <div
                    class="flex flex-col lg:flex-row gap-3 lg:gap-0 items-center justify-around p-6 rounded-lg bg-[#A4C639]">
                    <div class="flex flex-col justify-between items-center lg:items-start">
                        <h2 class="text-xl lg:text-2xl font-semibold text-white text-center">
                            Barang Dipinjam
                        </h2>
                        <p class="text-2xl lg:text-3xl font-bold text-white">
                            {{ $borrowItems }}
                        </p>
                    </div>
                    <div class="p-4 bg-[#EEEEEE] rounded-lg">
                        <svg width="46" height="46" viewBox="0 0 42 42" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.0627 0C2.73571 0 0 2.75099 0 6.07673V35.9233C0 39.249 2.73571 42 6.0627 42H35.9373C39.2643 42 42 39.249 42 35.9233V6.07673C42 2.75099 39.2643 0 35.9373 0H6.0627ZM6.0627 4.20288H14.6973V18.9068C14.7125 20.7659 16.9592 21.6894 18.2783 20.3788L21.0103 17.6685L23.7217 20.3788C25.0408 21.6894 27.2875 20.7659 27.3027 18.9068V4.20288H35.9373C36.9942 4.20288 37.7996 5.02024 37.7996 6.07673V35.9233C37.7996 36.9798 36.9942 37.8012 35.9373 37.8012H6.0627C5.00578 37.8012 4.20451 36.9798 4.20451 35.9233V6.07673C4.20451 5.02024 5.00578 4.20288 6.0627 4.20288ZM18.8977 4.20288H23.1023V13.8387L22.4829 13.2196C21.6636 12.4055 20.3405 12.4055 19.5212 13.2196L18.8977 13.8387L18.8977 4.20288Z"
                                fill="#1B1833" />
                        </svg>
                    </div>
                </div>
                <div
                    class="flex flex-col lg:flex-row gap-3 lg:gap-0 items-center justify-around p-6 rounded-lg bg-[#A4C639]">
                    <div class="flex flex-col justify-between items-center lg:items-start">
                        <h2 class="text-xl lg:text-2xl font-semibold text-white text-center">
                            Barang Dikembalikan
                        </h2>
                        <p class="text-2xl lg:text-3xl font-bold text-white">
                            {{ $returnItems }}
                        </p>
                    </div>
                    <div class="p-4 bg-[#EEEEEE] rounded-lg">
                        <svg width="46" height="46" viewBox="0 0 42 42" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.0627 0C2.73571 0 0 2.75099 0 6.07673V35.9233C0 39.249 2.73571 42 6.0627 42H35.9373C39.2643 42 42 39.249 42 35.9233V6.07673C42 2.75099 39.2643 0 35.9373 0H6.0627ZM6.0627 4.20288H14.6973V18.9068C14.7125 20.7659 16.9592 21.6894 18.2783 20.3788L21.0103 17.6685L23.7217 20.3788C25.0408 21.6894 27.2875 20.7659 27.3027 18.9068V4.20288H35.9373C36.9942 4.20288 37.7996 5.02024 37.7996 6.07673V35.9233C37.7996 36.9798 36.9942 37.8012 35.9373 37.8012H6.0627C5.00578 37.8012 4.20451 36.9798 4.20451 35.9233V6.07673C4.20451 5.02024 5.00578 4.20288 6.0627 4.20288ZM18.8977 4.20288H23.1023V13.8387L22.4829 13.2196C21.6636 12.4055 20.3405 12.4055 19.5212 13.2196L18.8977 13.8387L18.8977 4.20288Z"
                                fill="#1B1833" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="grid py grid-cols-1 lg:grid-cols-2 gap-8 mb-4 mx-10 ">
                <div
                    class="flex flex-col items-center justify-center rounded-lg gap-4 bg-gray-50 p-16 group hover:bg-[#50790B] cursor-pointer">
                    <div class="bg-[#50790B] p-6 rounded-full group-hover:bg-white">
                        <svg width="48" height="48" viewBox="0 0 62 62" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-white group-hover:fill-[#50790B]"
                                d="M58.8829 31.009C58.061 31.009 57.2727 31.3355 56.6915 31.9167C56.1103 32.4979 55.7838 33.2862 55.7838 34.1081V52.7027C55.7838 53.5246 55.4573 54.3129 54.8761 54.8941C54.2949 55.4753 53.5067 55.8018 52.6847 55.8018H9.2973C8.47537 55.8018 7.6871 55.4753 7.10591 54.8941C6.52472 54.3129 6.1982 53.5246 6.1982 52.7027V9.31527C6.1982 8.49334 6.52472 7.70507 7.10591 7.12388C7.6871 6.54269 8.47537 6.21617 9.2973 6.21617H27.8919C28.7138 6.21617 29.5021 5.88966 30.0833 5.30847C30.6645 4.72727 30.991 3.939 30.991 3.11707C30.991 2.29514 30.6645 1.50687 30.0833 0.925675C29.5021 0.344481 28.7138 0.0179696 27.8919 0.0179696H9.2973C6.83151 0.0179696 4.4667 0.997505 2.72312 2.74109C0.979535 4.48467 0 6.84948 0 9.31527V52.7027C0 55.1685 0.979535 57.5333 2.72312 59.2769C4.4667 61.0205 6.83151 62 9.2973 62H52.6847C55.1505 62 57.5153 61.0205 59.2589 59.2769C61.0025 57.5333 61.982 55.1685 61.982 52.7027V34.1081C61.982 33.2862 61.6555 32.4979 61.0743 31.9167C60.4931 31.3355 59.7049 31.009 58.8829 31.009ZM12.3964 33.3643V46.5045C12.3964 47.3264 12.7229 48.1147 13.3041 48.6959C13.8853 49.2771 14.6736 49.6036 15.4955 49.6036H28.6357C29.0436 49.606 29.4479 49.5278 29.8255 49.3736C30.203 49.2193 30.5465 48.9921 30.8361 48.7049L52.2818 27.2281L61.0833 18.6126C61.3738 18.3245 61.6043 17.9817 61.7617 17.6041C61.919 17.2264 62 16.8213 62 16.4122C62 16.0031 61.919 15.598 61.7617 15.2204C61.6043 14.8427 61.3738 14.5 61.0833 14.2119L47.9431 0.916709C47.655 0.626235 47.3122 0.39568 46.9346 0.238342C46.5569 0.0810051 46.1519 0 45.7427 0C45.3336 0 44.9286 0.0810051 44.5509 0.238342C44.1732 0.39568 43.8305 0.626235 43.5424 0.916709L34.8029 9.68717L13.2951 31.1639C13.0079 31.4535 12.7807 31.797 12.6264 32.1745C12.4722 32.5521 12.394 32.9564 12.3964 33.3643ZM45.7427 7.4868L54.5132 16.2573L50.1125 20.658L41.342 11.8875L45.7427 7.4868ZM18.5946 34.6349L36.9723 16.2573L45.7427 25.0277L27.3651 43.4054H18.5946V34.6349Z" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-center items-center gap-3">
                        <h2 class="text-xl lg:text-2xl text-black group-hover:text-white font-semibold">
                            Peminjaman
                        </h2>
                        <a href="{{ route('pinjamBarang') }}"
                            class="text-xl text-[#A4C639] group-hover:text-white group-hover:underline font-bold">
                            Klik Disini
                        </a>
                    </div>
                </div>
                <div
                    class="flex flex-col items-center justify-center rounded-lg gap-4 bg-gray-50 p-16 group hover:bg-[#50790B] cursor-pointer">
                    <div class="bg-[#50790B] p-6 rounded-full group-hover:bg-white">
                        <svg width="48" height="48" viewBox="0 0 42 42" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-white group-hover:fill-[#50790B]"
                                d="M6.0627 0C2.73571 0 0 2.75099 0 6.07673V35.9233C0 39.249 2.73571 42 6.0627 42H35.9373C39.2643 42 42 39.249 42 35.9233V6.07673C42 2.75099 39.2643 0 35.9373 0H6.0627ZM6.0627 4.20288H14.6973V18.9068C14.7125 20.7659 16.9592 21.6894 18.2783 20.3788L21.0103 17.6685L23.7217 20.3788C25.0408 21.6894 27.2875 20.7659 27.3027 18.9068V4.20288H35.9373C36.9942 4.20288 37.7996 5.02024 37.7996 6.07673V35.9233C37.7996 36.9798 36.9942 37.8012 35.9373 37.8012H6.0627C5.00578 37.8012 4.20451 36.9798 4.20451 35.9233V6.07673C4.20451 5.02024 5.00578 4.20288 6.0627 4.20288ZM18.8977 4.20288H23.1023V13.8387L22.4829 13.2196C21.6636 12.4055 20.3405 12.4055 19.5212 13.2196L18.8977 13.8387L18.8977 4.20288Z" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-center items-center gap-3">
                        <h2 class="text-xl lg:text-2xl text-black group-hover:text-white font-semibold">
                            Kembalikan
                        </h2>
                        <a href="{{ route('pinjamBarang') }}"
                            class="text-xl text-[#A4C639] group-hover:text-white group-hover:underline font-bold">
                            Klik Disini
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if (session('success'))
        <div id="alert-3" class="fixed top-4 right-4 z-50 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 1 0 0 2v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">{{ session('success') }}</div>
            <button type="button" class="ms-auto bg-green-50 text-green-500 rounded-lg p-1.5 hover:bg-green-200" aria-label="Close">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif @if (session('error'))
        <div id="alert-3" class="fixed top-4 right-4 z-50 flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 1 0 0 2v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Error</span>
            <div class="ms-3 text-sm font-medium">{{ session('error') }}</div>
            <button type="button" class="ms-auto bg-red-50 text-red-500 rounded-lg p-1.5 hover:bg-red-200" aria-label="Close">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif @if ($errors->any())
        <div id="alert-3" class="fixed top-4 right-4 z-50 flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 1 0 0 2v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Validation Error</span>
            <ul class="ms-3 text-sm font-medium">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="ms-auto bg-red-50 text-red-500 rounded-lg p-1.5 hover:bg-red-200" aria-label="Close">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    <script>

        function showAlert() {
            const alert = document.getElementById('alert-3');
            alert.style.display = 'flex';

            setTimeout(() => {
                alert.style.display = 'none';
            }, 3000);
        }

        showAlert()
    </script>
    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
