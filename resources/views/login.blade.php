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

<body class="h-full" x-data="alertComponent()">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-20 w-auto" src="{{ asset('img/logo-puskesmas.png') }}" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login ke Manajemen Inventaris Puskesmas Muara Satu</h2>

      {{-- modal untuk password salah --}}
        @if (session('failed')) 
          <div role="alert" class="rounded border-s-4 border-red-500 bg-red-50 p-4 mt-5">
            <div class="flex items-center gap-2 text-red-800">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                <path
                  fill-rule="evenodd"
                  d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                  clip-rule="evenodd"
                />
              </svg>

              <strong class="block font-medium"> {{session('failed')}} </strong>
            </div>
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
        <button type="submit" name="submit" class="flex m-auto w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Masuk</button>
      </div>

    </form>
  </div>
{{-- form --}}

</div>
{{-- <script src="//unpkg.com/alpinejs" defer></script> --}}

</body>
</html>





