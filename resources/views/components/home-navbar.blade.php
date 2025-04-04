<nav class="bg-gray-800 fixed w-full top-0 z-50 opacity-80 hover:opacity-90 transition" x-data="{ isOpen: false }">
    <div class="mx-3 md:mx-16 lg:px-56 py-3 md:py-4">
        <div class="flex h-16 items-center">
            <div class="mr-4 font-semibold">
                <a href="/"><img class="h-8" src="{{ asset('img/logo-puskesmas.png') }}" alt="Logo Puskesmas"></a>
            </div>
            <div class="flex items-center sm:gap-48 md:gap-10 text-balance sm:text-start">
                <div>
                    <h1 class="text-lg text-white font-bold sm:font-medium">Sistem Informasi Puskesmas Muara Satu</h1>
                </div>
                <div class="hidden md:block">
                    <div class="flex gap-x-4 items-center">
                        <x-nav-link href="/" :active="request()->is('/') || request()->is('/')">Home</x-nav-link>
                        <x-nav-link href="/inventaris/login" :active="request()->is('inventaris/login')">Pengelolaan inventaris</x-nav-link>
                        <x-nav-link href="/bendahara/login" :active="request()->is('bendahara/login')">Pengelolan Data Obat</x-nav-link>
                        <x-nav-link href="/masukan" :active="request()->is('masukan')">Beri Masukan</x-nav-link>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex sm:hidden">

                <!-- Mobile menu button -->
                <button @click="isOpen = !isOpen" type="button"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>

                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="sm:hidden" id="mobile-menu">
        <div class="border-t border-gray-700 pb-3">
            <div class="flex items-center px-5">
            </div>
            <div class="mt-3 space-y-1 px-2">
                <a href="/"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Home</a>
                <a href="/inventaris/login"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Pengelolaan
                    inventaris</a>
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Pengelolaan
                    bendahara</a>
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Beri
                    masukan</a>
            </div>
        </div>
    </div>
</nav>
