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
        <div class="h-full px-4 py-12 overflow-y-auto bg-gray-50">
            <!-- Logo -->
            <a href="#" class="flex items-center ps-2.5 mb-10">
                <img src="{{ asset('assets/img/logo.jpg') }}" class="h-6 me-3 sm:h-7" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap">LendEase</span>
            </a>
            @if (auth()->user()->role === 'admin')
            <ul class="space-y-2 py-4 font-medium">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-900 hover:text-white rounded-lg hover:bg-[#50790B] group">
                        <svg class="flex-shrink-0 w-5 h-5 text-[#50790B] transition duration-75 group-hover:text-white " aria-hidden="true"
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
                    <a href="#"
                        class="flex items-center p-2 text-white rounded-lg bg-[#50790B] group">
                        <svg class="w-5 h-5 text-white transition duration-75"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Peminjaman</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('return') }}"
                        class="flex items-center p-2 text-gray-900 hover:text-white rounded-lg hover:bg-[#50790B] group">
                        <svg class="flex-shrink-0 w-5 h-5 text-[#50790B] transition duration-75 group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path d="M12.7071 2.29289C13.0976 2.68342 13.0976 3.31658 12.7071 3.70711L11.4142 5H16C18.7614 5 21 7.23858 21 10C21 12.7614 18.7614 15 16 15H8C7.44772 15 7 14.5523 7 14C7 13.4477 7.44772 13 8 13H16C17.6569 13 19 11.6569 19 10C19 8.34315 17.6569 7 16 7H11.4142L12.7071 8.29289C13.0976 8.68342 13.0976 9.31658 12.7071 9.70711C12.3166 10.0976 11.6834 10.0976 11.2929 9.70711L8.29289 6.70711C7.90237 6.31658 7.90237 5.68342 8.29289 5.29289L11.2929 2.29289C11.6834 1.90237 12.3166 1.90237 12.7071 2.29289Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Pengembalian</span>
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
                    <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-900 hover:text-white rounded-lg hover:bg-[#50790B] group">
                        <svg class="flex-shrink-0 w-5 h-5 text-[#50790B] transition duration-75 group-hover:text-white " aria-hidden="true"
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
                    <a href="#"
                        class="flex items-center p-2 text-white rounded-lg bg-[#50790B] group">
                        <svg class="w-5 h-5 text-white transition duration-75"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Peminjaman</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('return') }}"
                        class="flex items-center p-2 text-gray-900 hover:text-white rounded-lg hover:bg-[#50790B] group">
                        <svg class="flex-shrink-0 w-5 h-5 text-[#50790B] transition duration-75 group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path d="M12.7071 2.29289C13.0976 2.68342 13.0976 3.31658 12.7071 3.70711L11.4142 5H16C18.7614 5 21 7.23858 21 10C21 12.7614 18.7614 15 16 15H8C7.44772 15 7 14.5523 7 14C7 13.4477 7.44772 13 8 13H16C17.6569 13 19 11.6569 19 10C19 8.34315 17.6569 7 16 7H11.4142L12.7071 8.29289C13.0976 8.68342 13.0976 9.31658 12.7071 9.70711C12.3166 10.0976 11.6834 10.0976 11.2929 9.70711L8.29289 6.70711C7.90237 6.31658 7.90237 5.68342 8.29289 5.29289L11.2929 2.29289C11.6834 1.90237 12.3166 1.90237 12.7071 2.29289Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Pengembalian</span>
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
                    Pages / Peminjaman Barang
                </p>
                <p class="text-lg font-bold text-white">
                    Peminjaman Barang
                </p>
            </div>
            <div class="flex flex-col justify-around gap-4 mx-10 -mt-36 mb-4 p-8 rounded-xl bg-white">
                <div class="flex flex-col gap-6 justify-start items-start p-8 lg:p-0">
                    <h1 class="text-2xl font-bold">List Peminjaman</h1>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="pb-4 bg-white dark:bg-gray-900">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="table-search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for items">
                        </div>
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th scope="col" class="p-4">
                                    <p class="text-md font-bold text-black">
                                        No.
                                    </p>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Barang
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jumlah
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status Barang
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Peminjaman
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Pengembalian
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loans as $loan)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="w-4 p-4">
                                    <p class="text-md font-bold text-black">
                                        {{ $loop->iteration }}
                                    </p>
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $loan->item->name }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $loan->amount }}
                                </th>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-full text-sm
                                        {{ $loan->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                        {{ $loan->status === 'approved' ? 'bg-blue-100 text-blue-800' : '' }}
                                        {{ $loan->status === 'returned' ? 'bg-green-100 text-green-800' : '' }}
                                        {{ $loan->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}">
                                        {{ ucfirst($loan->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $loan->borrow_date->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    @isset($loan->return_date)
                                        {{ $loan->return_date->format('d/m/Y') }}
                                    @else
                                        Barang Belum Dikembalikan
                                    @endisset
                                </td>
                                <td class="px-6 py-4">
                                    @if($loan->status === 'approved' && !$loan->return_date)
                                    <button data-modal-target="returnModal-{{ $loan->id }}" data-modal-toggle="returnModal-{{ $loan->id }}"
                                        class="font-medium text-blue-600 hover:underline">
                                        Kembalikan
                                    </button>
                                    <!-- Return Modal -->
                                    <div id="returnModal-{{ $loan->id }}" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                                            <div class="relative bg-white rounded-lg shadow">
                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                    <h3 class="text-xl font-semibold">
                                                        Pengembalian Barang
                                                    </h3>
                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                        data-modal-hide="returnModal-{{ $loan->id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <form action="{{ route('loans.return', $loan->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="p-4 md:p-5 space-y-4">
                                                        <div class="mb-5">
                                                            <label class="block mb-2 text-sm font-medium text-gray-900">
                                                                Foto Bukti Pengembalian
                                                            </label>
                                                            <input type="file" name="return_photo" accept="image/*"
                                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                                                        </div>
                                                        <div class="mb-5">
                                                            <label class="block mb-2 text-sm font-medium text-gray-900">
                                                                Deskripsi Pengembalian
                                                            </label>
                                                            <textarea name="return_description" rows="4"
                                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                                                placeholder="Deskripsi kondisi barang saat dikembalikan..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                            Kembalikan Barang
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if($loan->status === 'pending')
                                        <button data-modal-target="returnModal-{{ $loan->id }}" data-modal-toggle="returnModal-{{ $loan->id }}"
                                            class="font-medium text-blue-600 hover:underline">
                                            Kembalikan
                                        </button>
                                        <!-- Return Modal -->
                                        <div id="returnModal-{{ $loan->id }}" tabindex="-1" aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                        <h3 class="text-xl font-semibold">
                                                            Pengembalian Barang
                                                        </h3>
                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                            data-modal-hide="returnModal-{{ $loan->id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('loans.return', $loan->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="p-4 md:p-5 space-y-4">
                                                            <div class="mb-5">
                                                                <label class="block mb-2 text-sm font-medium text-gray-900">
                                                                    Foto Bukti Pengembalian
                                                                </label>
                                                                <input type="file" name="return_photo" accept="image/*"
                                                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                                                            </div>
                                                            <div class="mb-5">
                                                                <label class="block mb-2 text-sm font-medium text-gray-900">
                                                                    Deskripsi Pengembalian
                                                                </label>
                                                                <textarea name="return_description" rows="4"
                                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                                                    placeholder="Deskripsi kondisi barang saat dikembalikan..."></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                                Kembalikan Barang
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex flex-col justify-around gap-4 mx-10 mb-4 p-8 rounded-xl bg-white">
                <div class="flex flex-col gap-6 justify-start items-start p-8 lg:p-0">
                    <h1 class="text-2xl font-bold text-[#50790B]">Tambah Barang Peminjaman</h1>
                </div>
                <div class="flex justify-start p-2">
                    <form id="borrowForm" action="{{ route('items.borrow') }}" method="POST" class="w-screen">
                        @csrf
                        <div class="mb-5">
                            <label for="item_id" class="block mb-2 text-lg font-medium text-gray-900">Nama Barang</label>
                            <select id="item_id" name="item_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option value="" disabled selected>Pilih Barang</option>
                                @foreach ($items as $availableItem)
                                    <option value="{{ $availableItem->id }}">{{ $availableItem->name }} (Stok: {{ $availableItem->stock }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="amount" class="block mb-2 text-lg font-medium text-gray-900">Jumlah Barang</label>
                            <input type="number" id="amount" name="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Jumlah yang ingin dipinjam" required min="1" />
                        </div>
                        <div class="mb-5">
                            <label for="user" class="block mb-2 text-lg font-medium text-gray-900">Oleh Siapa</label>
                            <input type="text" id="user" name="user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ Auth::user()->name }}" readonly />
                        </div>
                        <div class="mb-5">
                            <label for="borrow_date" class="block mb-2 text-lg font-medium text-gray-900">Tanggal Peminjaman</label>
                            <input type="date" id="borrow_date" name="borrow_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ now()->format('Y-m-d') }}" readonly />
                        </div>
                        <div class="mb-5">
                            <label for="description" class="block mb-2 text-lg font-medium text-gray-900">Keterangan Barang</label>
                            <input type="text" id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Peminjaman Untuk Apa?" required />
                        </div>
                        <div class="flex justify-end items-end">
                            <button type="submit" class="text-white bg-[#A4C639] hover:bg-[#50790B] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Submit Peminjaman
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div id="alert-3"
            class="fixed top-4 right-4 z-50 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 "
            role="alert" style="display: none">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif @if (session('error'))
        <div id="alert-3"
            class="fixed top-4 right-4 z-50 flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50"
            role="alert" style="display: none">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('error') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
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

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    <!-- JavaScript -->
    <script>
        document.getElementById('item_id').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var stock = selectedOption.getAttribute('data-stock');
            var amountInput = document.getElementById('amount');
            amountInput.setAttribute('max', stock);  // Set max amount to the stock value
        });

        // Ambil input search dan table body
        const searchInput = document.getElementById('table-search');
        const tableRows = document.querySelectorAll('tbody tr');

        // Fungsi pencarian berdasarkan kolom "Product name"
        searchInput.addEventListener('keyup', function() {
            const searchTerm = searchInput.value.toLowerCase();

            tableRows.forEach(row => {
                const productName = row.querySelector('th').textContent.toLowerCase(); // Ambil text dari kolom "Product name"
                if (productName.includes(searchTerm)) {
                    row.style.display = ''; // Tampilkan baris jika cocok
                } else {
                    row.style.display = 'none'; // Sembunyikan baris jika tidak cocok
                }
            });
        });

        function showAlert() {
            const alert = document.getElementById('alert-3');
            alert.style.display = 'flex';

            setTimeout(() => {
                alert.style.display = 'none';
            }, 2000);
        }

        showAlert()

    </script>
</body>
</html>
