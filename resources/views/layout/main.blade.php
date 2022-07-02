<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auth System</title>

    <!-- CSS only -->
    <link rel="stylesheet" href={{ asset('css\app.css') }}>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    {{-- jQuery  --}}
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
</head>
<body>
    {{-- navigation bar --}}
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Navbar</a>
            <div class="d-flex">
                <a class="nav-link" href={{ route('page.login') }} style="padding-right: 5px">Login</a>
                <a class="nav-link"  href={{ route('page.signup') }} style="padding-left: 5px">Sign Up</a>
            </div>
        </div>
    </nav>
    {{-- contain the page contents --}}
    @yield('content')
</body>
</html>