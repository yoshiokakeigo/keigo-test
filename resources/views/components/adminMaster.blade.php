<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('css')
    <title>{{ $title ?? 'tryce tech' }}</title>
</head>

<body class="bg-gray-50">
    <x-tryce.admin.login></x-tryce.admin.login>
    {{ $slot }}
    <x-tryce.footer />
</body>

</html>
