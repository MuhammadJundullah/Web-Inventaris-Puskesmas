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
<body>

<div>
  <div class="sm:hidden">
    <label for="Tab" class="sr-only">Tab</label>

    <select id="Tab" class="w-full rounded-md border-gray-200">
      <option>Settings</option>
      <option>Messages</option>
      <option>Archive</option>
      <option select>Notifications</option>
    </select>
  </div>

  <div class="hidden sm:block">
    <nav class="flex gap-6" aria-label="Tabs">
      <a
        href="#"
        class="shrink-0 rounded-lg p-2 text-sm font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-700"
      >
        Settings
      </a>

      <a
        href="#"
        class="shrink-0 rounded-lg p-2 text-sm font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-700"
      >
        Messages
      </a>

      <a
        href="#"
        class="shrink-0 rounded-lg p-2 text-sm font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-700"
      >
        Archive
      </a>

      <a
        href="#"
        class="shrink-0 rounded-lg bg-sky-100 p-2 text-sm font-medium text-sky-600"
        aria-current="page"
      >
        Notifications
      </a>
    </nav>
  </div>
</div>
</body>
</html>