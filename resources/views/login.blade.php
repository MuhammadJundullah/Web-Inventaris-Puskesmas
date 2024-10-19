{{-- heading --}}
  <!DOCTYPE html>
    <html lang="en" class="h-full bg-white">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login - Manajemen Inventaris Puskesmas</title>
        @vite('resources/css/app.css')
    </head>
{{-- heading --}}

<body class="h-full">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-20 w-auto" src="{{ asset('img/logo-puskesmas.png') }}" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login ke Manajemen Inventaris Puskesmas Muara Satu</h2>

      {{-- modal untuk password salah --}}
        @if (session('failed')) 
          <div role="alert" class="rounded border-s-4 border-red-500 bg-red-50 p-4 mt-5">
            <strong class="block font-medium text-red-800">{{session('failed')}}</strong>
          </div>
        @endif
      {{-- modal untuk password salah --}}
    
  </div>

{{-- form --}}
  <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">

    {{-- input username --}}
    <form id='loginForm' class="space-y-6" action="/login" method="POST">
      @csrf
      <div>
      <label for="username" class="relative block overflow-hidden border-b border-gray-200 bg-transparent pt-3 focus-within:border-blue-600">
        <input type="text" name='username' id="username" placeholder="Username" class="peer h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" required/>
          <span class="absolute start-0 top-2 -translate-y-1/2 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-2 peer-focus:text-xs">Username</span>
      </label>
      </div>

      {{-- input password --}}
      <div>
        <div>
        <label for="password" class="relative block overflow-hidden border-b border-gray-200 bg-transparent pt-3 focus-within:border-blue-600">
          <input type="password" name='password' id="password" placeholder="password" class="peer h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" required/>
            <span class="absolute start-0 top-2 -translate-y-1/2 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-2 peer-focus:text-xs">Password</span>
        </label>
        </div>

      <div class="mt-5">
        <button type="submit" name="submit" class="flex m-auto justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Masuk</button>
      </div>

    </form>
  </div>
{{-- form --}}

    <div id="root">
        <!-- Tempat untuk notifikasi -->
    </div>

    <script>
        // Mengirim status ke JavaScript
        window.failed = {{ json_encode(session('failed', false)) }};
        window.message = "Password salah"; // Pesan bisa diubah sesuai kebutuhan
    </script>

</div>
<script src="//unpkg.com/alpinejs" defer></script>

</body>
</html>





