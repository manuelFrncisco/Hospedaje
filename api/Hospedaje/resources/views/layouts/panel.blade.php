<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css.css.css')}}">
</head>

<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-warning">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 text-black" href="/">Panel</a>
        <!-- Sidebar Toggle-->

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion bg-warning bg-opacity-75" id="sidenavAccordion">                    
            </nav>
        </div>
        <div id="layoutSidenav_content">

            @yield('content')

        </div>
    </div>
</body>

</html>