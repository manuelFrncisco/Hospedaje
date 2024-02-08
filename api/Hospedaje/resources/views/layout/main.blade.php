<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    @vite(['https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css'])
    @vite(['resources/css/css.css'])


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main>

        @yield('content')


    </main>
</body>

</html>