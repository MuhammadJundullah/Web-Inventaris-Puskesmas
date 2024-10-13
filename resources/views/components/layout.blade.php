<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventaris - Puskesmas</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-navbar></x-navbar>
    <x-header>{{$title}}</x-header>
    <main>
        {{$slot}}
    </main>
    <script src="//unpkg.com/alpinejs" defer></script> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite('resources/js/app.js')
</body>
</html>
