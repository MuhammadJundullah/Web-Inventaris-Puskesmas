<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>

    
    {{-- form --}}
    <div class="my-10 sm:mx-auto sm:w-full sm:max-w-sm">
      
        <p class="mt-1 text-sm leading-6 text-gray-600">Akun yang anda daftarkan akan dapat masuk dengan username dan password yang didaftarkan.</p>

    {{-- input username --}}
    <form class="space-y-6" action="{{ route('login') }}" method="POST">
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
          <input id="konfirmasi" name="konfirmasi" type="konfirmasi" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Buat Akun</button>
      </div>
    </form>
  </div>
</x-layout>