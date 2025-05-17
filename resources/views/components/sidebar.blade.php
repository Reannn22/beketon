<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform bg-[#F4F4F4] -translate-x-full sm:translate-x-0 shadow-xl" aria-label="Sidebar">
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
                    <svg class="flex-shrink-0 w-5 h-5 text-[#50790B] transition duration-75 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('items') }}" class="flex items-center p-2 text-gray-900 hover:text-white rounded-lg hover:bg-[#50790B] group">
                    <svg class="flex-shrink-0 w-5 h-5 text-[#50790B] transition duration-75 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Inventaris</span>
                </a>
            </li>
            <li>
                <a href="{{ route('loans') }}"
                    class="flex items-center p-2 {{ request()->routeIs('loans') ? 'text-white bg-[#50790B]' : 'text-gray-900 hover:text-white hover:bg-[#50790B]' }} rounded-lg group">
                    <svg class="w-5 h-5 {{ request()->routeIs('loans') ? 'text-white' : 'text-[#50790B] group-hover:text-white' }} transition duration-75"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Peminjaman</span>
                </a>
            </li>
            <li>
                <a href="{{ route('return') }}" class="flex items-center p-2 text-gray-900 hover:text-white rounded-lg hover:bg-[#50790B] group">
                    <svg class="flex-shrink-0 w-5 h-5 text-[#50790B] transition duration-75 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Pengembalian</span>
                </a>
            </li>
            <!-- ...rest of admin menu items... -->
        </ul>
        @else
        <ul class="space-y-2 py-4 font-medium">
            <!-- ...user menu items... -->
        </ul>
        @endif
    </div>
</aside>
