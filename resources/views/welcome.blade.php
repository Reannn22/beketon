<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to LendEase</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/img/Avatar.png') }}">

    <!-- Flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    {{-- Link Laraval --}}
    <link href="{{ mix('resources/css/app.css') }}" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden
        }
        .bg-hero {
    background: #222c1e; /* Mengubah warna ke biru */
        }


    </style>
</head>
<body>
    @php
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Asset;
    @endphp

    <header class="bg-[#50790B] py-2 shadow-2xl shadow-white">
        <nav class="border-gray-200 px-4 lg:px-6 py-2.5">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="#" class="flex items-center">
                    <img src="{{ asset('assets/img/logo.jpg') }}" class="mr-3 h-6 sm:h-9" alt="LendEase Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap text-white">LendEase</span>
                </a>
                <div class="flex items-center lg:order-2">
                    @if (Route::has('login'))
                        @auth
                        <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white hover:bg-blue-700 focus:ring-4 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none focus:ring-blue-800">
                            Dashboard
                        </a>
                    @else
                    <a href="{{ route('login') }}"
                        class="bg-white text-[#50790B] border border-[#50790B] hover:bg-[#e6f3d6] focus:ring-4 focus:ring-[#b7d88f] font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none transition duration-200">
                        Log in
                    </a>

                        @endauth
                    @endif

                    <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-white rounded-lg lg:hidden hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-white hover:text-[#CA872C] rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0" aria-current="page">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#featured" class="block py-2 pr-4 pl-3 text-white hover:text-[#CA872C] border-b border-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">
                                Featured
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="bg-hero py-40">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
            <a href="/login" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full" role="alert">
                <span class="text-xs bg-[#50790B] rounded-full text-white px-4 py-1.5 mr-3">New</span> <span class="text-sm font-medium">LendEase is out! See what's new</span>
                <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </a>
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Solusi Digital untuk Peminjaman Barang Anda</h1>
            <p class="mb-8 text-lg font-normal text-gray-400 lg:text-xl sm:px-16 xl:px-48">
                LendEase membantu Anda meminjam dan mengelola barang dengan mudah dan transparan. Dengan fitur
                yang lengkap dan antarmuka yang intuitif, kami memastikan pengalaman peminjaman barang lebih cepat,
                aman, dan terorganisir.
            </p>
            <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <a href="/login" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-400 rounded-lg border border-gray-300 hover:bg-white hover:text-black focus:ring-4 focus:ring-gray-100">
                    Learn more
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="px-4 mx-auto text-center md:max-w-screen-md lg:max-w-screen-lg lg:px-36">
                <span class="font-semibold text-gray-400 uppercase">FEATURED IN</span>
                <div class="flex justify-center items-center text-center mt-8 text-gray-400">
                    <a href="/login" class="mr-5 mb-5 lg:mb-0 hover:text-[#50790B]">
                        <svg class="h-11" viewBox="0 0 208 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M42.7714 20.729C42.7714 31.9343 33.6867 41.019 22.4814 41.019C11.2747 41.019 2.19141 31.9343 2.19141 20.729C2.19141 9.52228 11.2754 0.438965 22.4814 0.438965C33.6867 0.438965 42.7714 9.52297 42.7714 20.729Z" fill="currentColor"/>
                            <path d="M25.1775 21.3312H20.1389V15.9959H25.1775C25.5278 15.9959 25.8747 16.0649 26.1983 16.1989C26.522 16.333 26.8161 16.5295 27.0638 16.7772C27.3115 17.0249 27.508 17.319 27.6421 17.6427C27.7761 17.9663 27.8451 18.3132 27.8451 18.6635C27.8451 19.0139 27.7761 19.3608 27.6421 19.6844C27.508 20.0081 27.3115 20.3021 27.0638 20.5499C26.8161 20.7976 26.522 20.9941 26.1983 21.1281C25.8747 21.2622 25.5278 21.3312 25.1775 21.3312ZM25.1775 12.439H16.582V30.2234H20.1389V24.8881H25.1775C28.6151 24.8881 31.402 22.1012 31.402 18.6635C31.402 15.2258 28.6151 12.439 25.1775 12.439Z" fill="white"/>
                            <path d="M74.9361 17.4611C74.9361 16.1521 73.9305 15.3588 72.6239 15.3588H69.1216V19.5389H72.6248C73.9313 19.5389 74.9369 18.7457 74.9369 17.4611H74.9361ZM65.8047 28.2977V12.439H73.0901C76.4778 12.439 78.3213 14.7283 78.3213 17.4611C78.3213 20.1702 76.4542 22.4588 73.0901 22.4588H69.1216V28.2977H65.8055H65.8047ZM80.3406 28.2977V16.7362H83.3044V18.2543C84.122 17.2731 85.501 16.4563 86.9027 16.4563V19.3518C86.6912 19.3054 86.4349 19.2826 86.0851 19.2826C85.1039 19.2826 83.7949 19.8424 83.3044 20.5681V28.2977H80.3397H80.3406ZM96.8802 22.3652C96.8802 20.6136 95.8503 19.0955 93.9823 19.0955C92.1364 19.0955 91.1105 20.6136 91.1105 22.366C91.1105 24.1404 92.1364 25.6585 93.9823 25.6585C95.8503 25.6585 96.8794 24.1404 96.8794 22.3652H96.8802ZM88.0263 22.3652C88.0263 19.1663 90.2684 16.4563 93.9823 16.4563C97.7198 16.4563 99.962 19.1655 99.962 22.3652C99.962 25.5649 97.7198 28.2977 93.9823 28.2977C90.2684 28.2977 88.0263 25.5649 88.0263 22.3652ZM109.943 24.3739V20.3801C109.452 19.6316 108.378 19.0955 107.396 19.0955C105.693 19.0955 104.524 20.4265 104.524 22.366C104.524 24.3267 105.693 25.6585 107.396 25.6585C108.378 25.6585 109.452 25.1215 109.943 24.3731V24.3739ZM109.943 28.2977V26.5697C109.054 27.6899 107.841 28.2977 106.462 28.2977C103.637 28.2977 101.465 26.1499 101.465 22.3652C101.465 18.6993 103.59 16.4563 106.462 16.4563C107.793 16.4563 109.054 17.0177 109.943 18.1843V12.439H112.932V28.2977H109.943ZM123.497 28.2977V26.5925C122.727 27.4337 121.372 28.2977 119.526 28.2977C117.052 28.2977 115.884 26.9431 115.884 24.7473V16.7362H118.849V23.5798C118.849 25.1451 119.666 25.6585 120.927 25.6585C122.071 25.6585 122.983 25.028 123.497 24.3731V16.7362H126.463V28.2977H123.497ZM128.69 22.3652C128.69 18.9092 131.212 16.4563 134.67 16.4563C136.982 16.4563 138.383 17.4611 139.131 18.4886L137.191 20.3093C136.655 19.5153 135.838 19.0955 134.81 19.0955C133.011 19.0955 131.751 20.4037 131.751 22.366C131.751 24.3267 133.011 25.6585 134.81 25.6585C135.838 25.6585 136.655 25.1915 137.191 24.4203L139.131 26.2426C138.383 27.2702 136.982 28.2977 134.67 28.2977C131.212 28.2977 128.69 25.8456 128.69 22.3652ZM141.681 25.1915V19.329H139.813V16.7362H141.681V13.6528H144.648V16.7362H146.935V19.329H144.648V24.3975C144.648 25.1215 145.02 25.6585 145.675 25.6585C146.118 25.6585 146.541 25.495 146.702 25.3087L147.334 27.5728C146.891 27.9714 146.096 28.2977 144.857 28.2977C142.779 28.2977 141.681 27.2238 141.681 25.1915ZM165.935 28.2977V21.454H158.577V28.2977H155.263V12.439H158.577V18.5577H165.935V12.4398H169.275V28.2977H165.935ZM179.889 28.2977V26.5925C179.119 27.4337 177.764 28.2977 175.919 28.2977C173.443 28.2977 172.276 26.9431 172.276 24.7473V16.7362H175.241V23.5798C175.241 25.1451 176.058 25.6585 177.32 25.6585C178.464 25.6585 179.376 25.028 179.889 24.3731V16.7362H182.856V28.2977H179.889ZM193.417 28.2977V21.1986C193.417 19.6333 192.602 19.0963 191.339 19.0963C190.172 19.0963 189.285 19.7504 188.77 20.4045V28.2985H185.806V16.7362H188.77V18.1843C189.495 17.3439 190.896 16.4563 192.718 16.4563C195.217 16.4563 196.408 17.8573 196.408 20.0523V28.2977H193.418H193.417ZM199.942 25.1915V19.329H198.076V16.7362H199.943V13.6528H202.91V16.7362H205.198V19.329H202.91V24.3975C202.91 25.1215 203.282 25.6585 203.936 25.6585C204.38 25.6585 204.802 25.495 204.965 25.3087L205.595 27.5728C205.152 27.9714 204.356 28.2977 203.119 28.2977C201.04 28.2977 199.943 27.2238 199.943 25.1915" fill="currentColor"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-hero py-20" id="featured">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-white">Fitur Unggulan yang Memudahkan Anda</h2>
                <p class="text-gray-300 sm:text-xl">Here at LendEase we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growt</p>
            </div>
            <div class="space-y-8 md:grid md:grid-cols-1 lg:grid-cols-2 md:gap-12 md:space-y-0">
                <div class="bg-white px-16 py-8 rounded-lg">
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-[#50790B] lg:w-6 lg:h-6 dark:text-primary-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    </div>
                    <h3 class="mb-2 text-xl text-[#50790B] font-bold">Manajemen Barang yang Praktis</h3>
                    <p class="text-[#50790B]">Kelola data barang dengan mudah, mulai dari menambah, mengedit, hingga menghapus barang. Fitur ini dirancang untuk memastikan inventaris barang Anda selalu up-to-date.</p>
                </div>
                <div class="bg-white px-16 py-8 rounded-lg">
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-[#50790B] lg:w-6 lg:h-6 dark:text-primary-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path></svg>
                    </div>
                    <h3 class="mb-2 text-xl text-[#50790B] font-bold">Peminjaman Barang Secara Real-Time</h3>
                    <p class="text-[#50790B]">
                        Pengguna dapat melihat ketersediaan barang secara langsung, meminjam barang dengan satu klik,
                        dan mencatat peminjaman secara otomatis. Sistem memastikan barang tersedia sesuai permintaan.
                    </p>
                </div>
                <div class="bg-white px-16 py-8 rounded-lg">
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-[#50790B] lg:w-6 lg:h-6 dark:text-primary-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path><path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path></svg>
                    </div>
                    <h3 class="mb-2 text-xl text-[#50790B] font-bold">Laporan Aktivitas yang Transparan</h3>
                    <p class="text-[#50790B]">
                        Pantau setiap aktivitas peminjaman dengan laporan yang rinci. Log aktivitas mencatat tindakan pengguna,
                        memudahkan admin untuk melacak penggunaan barang dan menganalisis data peminjaman.
                    </p>
                </div>
                <div class="bg-white px-16 py-8 rounded-lg">
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-[#50790B] lg:w-6 lg:h-6 dark:text-primary-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path></svg>
                    </div>
                    <h3 class="mb-2 text-xl text-[#50790B] font-bold">Pengelolaan Pengguna yang Aman</h3>
                    <p class="text-[#50790B]">
                        Admin dapat mengelola pengguna dengan kontrol penuh, termasuk menambahkan, menghapus,
                        atau memperbarui akun. Sistem juga mendukung peran pengguna dengan hak akses yang berbeda untuk keamanan yang lebih baik.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-[#50790B] shadow sm:flex sm:items-center sm:justify-between p-4 sm:p-6 xl:p-8 antialiased">
        <p class="mb-4 text-sm text-center text-gray-300 sm:mb-0">
            &copy; 2025-2026 <a href="#" class="hover:underline" target="_blank">LendEase.com</a>. All rights reserved.
        </p>
        <div class="flex justify-center items-center space-x-1">
            <a href="#" data-tooltip-target="tooltip-facebook" class="inline-flex justify-center p-2 text-gray-400 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                    <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                </svg>
                <span class="sr-only">Facebook</span>
            </a>
            <div id="tooltip-facebook" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                Like us on Facebook
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <a href="#" data-tooltip-target="tooltip-twitter" class="inline-flex justify-center p-2 text-gray-400 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path fill="currentColor" d="M12.186 8.672 18.743.947h-2.927l-5.005 5.9-4.44-5.9H0l7.434 9.876-6.986 8.23h2.927l5.434-6.4 4.82 6.4H20L12.186 8.672Zm-2.267 2.671L8.544 9.515 3.2 2.42h2.2l4.312 5.719 1.375 1.828 5.731 7.613h-2.2l-4.699-6.237Z"/>
                </svg>
                <span class="sr-only">Twitter</span>
            </a>
            <div id="tooltip-twitter" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                Follow us on Twitter
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <a href="#" data-tooltip-target="tooltip-github" class="inline-flex justify-center p-2 text-gray-400 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                </svg>
                <span class="sr-only">Github</span>
            </a>
            <div id="tooltip-github" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                Star us on GitHub
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

        </div>
    </footer>

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
