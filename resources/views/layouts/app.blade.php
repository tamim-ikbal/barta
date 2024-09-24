<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"/>
    @vite('resources/css/app.css')

    <!-- AlpineJS CDN -->


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

    <title>@yield('title') - {{ __('Barta') }}</title>

</head>
<body class="bg-gray-100">
@include('layouts.partials.header')
<main class="container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">

    @section('content')
    @show

</main>


@include('layouts.partials.footer')

@vite('resources/js/app.js')
</body>
</html>
