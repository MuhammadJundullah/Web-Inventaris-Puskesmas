<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventaris - Puskesmas</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>
<body>
    <x-navbar></x-navbar>
    <x-header>{{$title}}</x-header>
    <main>
        {{$slot}}
    </main>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
