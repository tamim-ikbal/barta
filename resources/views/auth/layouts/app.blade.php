<!DOCTYPE html>
<html class="html h-full bg-white">
<head>
    <meta charset="UTF-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"/>
    @vite('resources/css/app.css')
    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"/>
    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet"/>

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
    </style>
    @stack('styles')
    <title>@yield('title')</title>
</head>
<body class="h-full">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    @section('content')
    @show
</div>
@vite('resources/js/app.js')
@stack('scripts')
</body>
</html>
