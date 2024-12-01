<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen">
    <x-home-navbar></x-home-navbar>
    <main class="flex-grow">
        {{$slot}}
    </main>
    <x-footer></x-footer>
    <script src="//unpkg.com/alpinejs" defer></script> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
