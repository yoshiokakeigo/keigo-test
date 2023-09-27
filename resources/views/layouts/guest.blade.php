<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <x-tryce.header />
    <div
        class="login-bg-img min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 login-bg">
        <div class="hidden">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="bg-opacity-30  w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="login-wrapper text-center my-8">
                <img class="h-16 m-auto" src="images/image 1.png" alt="企業ロゴ">
                <h2 class="font-bold">社内システム</h2>
            </div>
            {{ $slot }}
        </div>
        <style>
            .login-bg-img {
                background: url("./images/27486398_m 1.png")no-repeat center / cover;
            }
        </style>
    </div>
    <x-tryce.footer />
</body>

</html>
