<nav class="bg-gray-800" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center gap-10 text-balance sm:text-start">
          <div class="flex-shrink-0">
            <a href="/dashboard"><img class="h-8" src="{{ asset('img/logo-puskesmas.png') }}" alt="Logo Puskesmas"></a>
          </div>
          <div>
            <h1 class="text-lg text-white font-bold">Sistem informasi Puskesmas Muara Satu</h1>
          </div>
          <div class="hidden md:block">
           <div class="ml-10 flex items-baseline space-x-4">              
              <x-nav-link href="/" :active="request()->is('/') || request()->is('/')">Home</x-nav-link>
              <x-nav-link href="/inventaris/login" :active="request()->is('inventaris/login')">Pengelolaan Inventaris</x-nav-link>              
              <x-nav-link href="#" :active="request()->is('bendahara/login')">Pengelolan Bendahara</x-nav-link>         
              <x-nav-link href="#" :active="request()->is('masukan')">Beri Masukan</x-nav-link>         
            </div>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">

          <!-- Mobile menu button -->
          <button @click="isOpen = !isOpen" type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>

            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
      <div class="border-t border-gray-700 pb-3">
        <div class="flex items-center px-5">
        </div>
        <div class="mt-3 space-y-1 px-2">
          <a href="/" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Home</a>
          <a href="/inventaris/login" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Pengelolaan Inventaris</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Pengelolaan Bendahara</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Beri Masukan</a>
        </div>
      </div>
    </div>
  </nav>





