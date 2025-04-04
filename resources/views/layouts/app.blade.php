<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Superhéroes Sanrio') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Comic+Neue:400,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                background-color: #ffe6f2;
                font-family: 'Comic Neue', cursive;
                text-align: center;
            }
            .container {
                max-width: 800px;
                margin: auto;
                padding: 20px;
                background: white;
                border-radius: 15px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            }
            .header-sanrio {
                background-color: #ff99cc;
                padding: 10px;
                border-radius: 10px;
                color: white;
                font-size: 24px;
                font-weight: bold;
            }
            .card-sanrio {
                background: #ffccff;
                padding: 10px;
                margin: 10px 0;
                border-radius: 10px;
                font-size: 18px;
            }
            .btn-sanrio {
                background: #ff66b2;
                color: white;
                padding: 10px 15px;
                text-decoration: none;
                border-radius: 5px;
                display: inline-block;
                margin-top: 10px;
            }
            .btn-sanrio:hover {
                background: #ff3385;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Encabezado Sanrio -->
            <div class="header-sanrio">🌸 Superhéroes Sanrio 🌸</div>

            <!-- Contenedor de contenido -->
            <main class="container">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

