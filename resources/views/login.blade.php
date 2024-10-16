<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Manajemen Inventaris Puskesmas</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>
<body class="h-full">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-20 w-auto" src="{{ asset('img/logo-puskesmas.png') }}" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login ke Manajemen Inventaris Puskesmas Muara Satu</h2>
  </div>

  {{-- form --}}
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

@php
    if (isset($salah)) {
      echo "<p>username dan password tidak sesuai</p>";
    }
@endphp


    {{-- input username --}}
    <form id='loginForm' class="space-y-6" action="/login" method="POST">
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
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          <div class="text-sm">
            <a href="#" class="font-semibold text-gray-600 hover:text-gray-500">Lupa Password?</a>
          </div>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <button type="submit" name="submit" class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Masuk</button>
      </div>

    </form>
  </div>
</div>
<script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>




