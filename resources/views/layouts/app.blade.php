<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="CRMS - Bootstrap Admin Template">
        <meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
        <meta name="author" content="Dreams technologies - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
        <script src="assets/js/jquery-3.7.1.min.js" type="c8b1dc016ed61e49b77f1fd6-text/javascript"></script>
        <script src="assets/js/theme-script.js" type="c8b1dc016ed61e49b77f1fd6-text/javascript"></script>
        <script src="assets/js/script.js" type="c8b1dc016ed61e49b77f1fd6-text/javascript"></script>
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/plugins/tabler-icons/tabler-icons.css">
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="assets/css/style.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
