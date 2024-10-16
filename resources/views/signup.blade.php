<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>

    {{-- form --}}

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">

  <div class="my-10 sm:mx-auto sm:w-full sm:max-w-sm">
    
    {{-- modal success --}}
      @if (session('success'))
          <div role="alert" class="rounded-xl border border-gray-100 bg-white p-4 mb-4">
              <div class="flex items-start gap-4">
                  <span class="text-green-600">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                  </span>
      
                  <div class="flex-1">
                      <strong class="block font-medium text-gray-900">Akun berhasil didaftarkan!</strong>
                      <p class="mt-1 text-sm text-gray-700">{{ session('success') }}</p>
                  </div>
      
                  <button class="text-gray-500 transition hover:text-gray-600" onclick="this.closest('div[role=\'alert\']').style.display='none'">
                      <span class="sr-only">Dismiss popup</span>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                  </button>
              </div>
          </div>
      @endif
    {{-- modal success --}}

    {{-- modal failed --}}
      @if (session("failed"))
          <div role="alert" class="rounded border-s-4 border-red-500 bg-red-50 p-4">
            <strong class="block font-medium text-red-800"> Konfirmasi Password salah.</strong>

            <p class="mt-2 text-sm text-red-700">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo quasi assumenda numquam deserunt
              consectetur autem nihil quos debitis dolor culpa.
            </p>
          </div>
      @endif

    {{-- modal failed --}}
    
        <p class="mt-1 text-sm leading-6 text-gray-600">Akun yang anda daftarkan akan dapat masuk dengan username dan password yang didaftarkan.</p>

    {{-- input username --}}
    <form class="space-y-6" action='/signup' method="POST">
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


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


  </div>
</div>
</x-layout>