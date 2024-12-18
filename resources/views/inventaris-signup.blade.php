<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <x-slot:username>{{$username}}</x-slot:username>

    {{-- form --}}

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">

  <div class="my-10 sm:mx-auto sm:w-full sm:max-w-sm">
  
    {{-- modal --}}
      @if (session("info"))
      <div role="alert" class="rounded border-s-4 border-{{session('info.warna')}}-500 bg-{{session('info.warna')}}-50 p-4">
        <span class="text-green-600 flex">
              @if (session('info.warna') == 'green')
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              @endif
              <strong class="block font-medium text-{{session('info.warna')}}-600 ml-2">{{session('info.pesan')}}</strong>
            </span>
          </div>
      @endif
    {{-- modal --}}
    
        <p class="mt-1 text-sm leading-6 text-gray-600">Akun yang anda daftarkan akan dapat masuk dengan username dan password yang didaftarkan.</p>

{{-- form --}}
    {{-- input username --}}
    <form class="space-y-6" action='/inventaris/signup' method="POST">
      @csrf
      <div>
        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username :</label>
        <div class="mt-2">
          <input id="username" name="username" type="text" autocomplete="username" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
        </div>
      </div>


      {{-- input password --}}
      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password :</label>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      
      {{-- konfirmasi password --}}
      <div>
        <div class="flex items-center justify-between">
          <label for="konfirmasi" class="block text-sm font-medium leading-6 text-gray-900">Konfirmasi Password :</label>
        </div>
        <div class="mt-2">
          <input id="konfirmasi" name="konfirmasi" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Buat Akun</button>
      </div>
    </form>
{{-- form --}}

  </div>
</div>
</x-layout>